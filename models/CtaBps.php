<?php
namespace app\models;

use app\components\Help;
use yii\base\Model;
use yii\web\UploadedFile;

class CtaBps extends Model
{
    const ESTADO_CIVIL_SOLTERO=1;
    const SEXO_MASCULINO=1;
    const SEXO_FEMENINO=2;
    const NACIONALIDADID_ARGENTINO=1;
    const NACIONALIDADID_OTRO=999;
    const BANCO_PATAGONIA=1;
    const CUENTA_CORRIENTE=1;
    const CAJA_AHORRO=2;

    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }
    
    public function importar() {

        $resultado = array();
        if ($this->validate()) {
            $content = file_get_contents($this->file->tempName);
            $ctaBps_array = preg_split('/\n|\r\n?/', trim($content)); 

            $listaPersona = array();
            foreach ($ctaBps_array as $value) {
                //Si viene una linea vacia saltamos la iteracion
                if(empty($value)){
                    break;
                }

                $row = array();
                $row['convenio'] = trim(mb_substr($value, 0, 4));
                $row['apellido'] = trim(utf8_encode(mb_substr($value, 4, 30)));
                $row['nombre'] = trim(utf8_encode(mb_substr($value, 34, 16)));
                $row['nro_documento'] = preg_replace('/^0+/', '', trim(utf8_encode(mb_substr($value, 62, 8))));
                $row['nacionalidad'] = trim(utf8_encode(mb_substr($value, 72, 1)));
                $row['nacionalidadid'] = ($row['nacionalidad']=='A')?self::NACIONALIDADID_ARGENTINO: self::NACIONALIDADID_OTRO;
                $row['fecha_nacimiento'] = trim(utf8_encode(mb_substr($value, 73, 8)));
                $row['sexo'] = trim(utf8_encode(mb_substr($value, 81, 1)));
                $row['sexoid'] = ($row['sexo']=='M')? self::SEXO_MASCULINO: self::SEXO_FEMENINO;
                $row['estado_civil'] = trim(utf8_encode(mb_substr($value, 82, 1)));
                $row['estado_civilid'] = self::ESTADO_CIVIL_SOLTERO;
                $row['cuil'] = trim(mb_substr($value, 182, 11));
                $row['lugar']['calle'] = trim(utf8_encode(mb_substr($value, 83, 19)));
                $row['lugar']['altura'] = intval(trim(mb_substr($value, 102, 9)));
                $row['lugar']['localidad'] = trim(mb_substr($value, 111, 30));
                $row['lugar']['codigo_postal'] = intval(trim(mb_substr($value, 141, 5)));
                $row['prestacion']['monto'] = intval(trim(mb_substr($value, 193, 5)));
                $row['prestacion']['fecha'] = trim(mb_substr($value, 216, 8));
                $row['cuenta']['tipo_inscripcionid'] = trim(mb_substr($value, 179, 3));
                $row['cuenta']['tipo_cuentaid'] = trim(utf8_encode(mb_substr($value, 50, 3)));
                $row['cuenta']['cbu'] = trim(mb_substr($value, 244, 27));
                $row['cuenta']['sub_sucursalid'] = trim(mb_substr($value, 149, 3));
                $listaPersona[] = $row;
            }

            $resultado = $this->registrarListaPersonaConCBU($listaPersona);
        } else {
            throw new \yii\web\HttpException(400, Help::ArrayErrorsToString($this->errors));
        }
        
        return $resultado;
    }
    
    /**
     * Se identifican las personas por cuil y se les crea una cuanta bancaria
     * @param array $lista_persona_bps
     */
    private function registrarListaPersonaConCBU($lista_persona_bps){

        #obtenemos las personas pendiente a importar(SIN CBU)
        $personas_perndientes_sin_cbu = Prestacion::find()->select('personaid as  id')->where(['estado' => Prestacion::SIN_CBU])->asArray()->all();
        $lista_personas_pendientes = \Yii::$app->registral->filtrarPersonaPorIds(['lista_ids' => $personas_perndientes_sin_cbu]);

        $resultado = array();
        $lista_persona_encontrada = [];
        foreach ($lista_personas_pendientes as $pendiente) {
            foreach ($lista_persona_bps as $persona) {
                //buscamos persona por lista de cuils
                if(strval($persona['cuil']) === strval($pendiente['cuil'])){
                    $pendiente['cuenta']['cbu'] = $persona['cuenta']['cbu'];
                    $pendiente['cuenta']['convenio'] = $persona['convenio'];
                    $lista_persona_encontrada[] = $pendiente;
                }
            }            
        }
                
        //registramos la cuenta bancaria de la persona
        $resultado = $this->crearCuentas($lista_persona_encontrada);
                
        $resultado['errors'] = [];
        return $resultado;
    }
    
    /**
     * Se crean cuentas bancarias masivamente con una lista de personas
     * @param array $lista_personas
     */
    private function crearCuentas($lista_personas){
        $cant_registros = 0;
        $cant_existe = 0;
        $resultado = array();
        $errors = array();
        $i=0;

        foreach ($lista_personas as $persona) {

            #Chequeamos el tipo de convenio a importar
            $tipo_convenioid = null;
            switch ($persona['cuenta']['convenio']) {
                case '8180':
                    $tipo_convenioid = 1;
                    break;
                case '8277':
                    $tipo_convenioid = 2;
                    break;
            }

            $cuenta = new Cuenta();
            $cuenta->personaid = intval($persona['id']);
            $cuenta->bancoid = self::BANCO_PATAGONIA;
            $cuenta->tipo_cuentaid = self::CAJA_AHORRO;
            $cuenta->cbu = $persona['cuenta']['cbu'];
            $cuenta->create_at = date('Y-m-d H:i:s');
            $cuenta->import_at = date('Y-m-d H:i:s');
            $cuenta->tipo_convenioid = $tipo_convenioid;
            $cuenta->scenario = Cuenta::SCENARIO_IMPORTADO_BPS;

            #Cuantificamos los cbu existentes
            if(Cuenta::findOne(['cbu' => $cuenta->cbu]) != NULL){
                $cant_existe++;
            }
            
            if(!$cuenta->save()){
                $error = $persona['nombre']." ".$persona['apellido']." cuil:".$persona['cuil']." " . Help::ArrayErrorsToString($cuenta->errors);
                $errors[] = $error;
            }else{
                
                $prestacion = Prestacion::findOne(['personaid' => $cuenta->personaid]);
                //chequeamos que la persona este en el convenio
                if(!isset($prestacion)){
                    //borramos la cuenta si la persona no pasó por el convenio
                    $cuenta->delete();
                    $error = "La persona ".$persona['nombre']." ".$persona['apellido']." cuil:".$persona['cuil']." no fue dado de alta en ningún convenio";
                    $errors[] = $error;
                }else{
                    $prestacion->setScenario(Prestacion::SCENARIO_IMPORTADO_BPS);
                    $prestacion->estado = Prestacion::CON_CBU;
                    
                    if(!$prestacion->save()){
                        $prestacion_errores = Help::ArrayErrorsToString($prestacion->errors);    
                        $errors[] = "(fila: $i) La persona ".$persona['nombre']." ".$persona['apellido']." cuil:".$persona['cuil'].$prestacion_errores;
                    }
                    $cant_registros++;
                }
            }
            
            $i++;
        }
            
        $resultado['creadas'] = $cant_registros;
        $resultado['existen'] = $cant_existe;
        $resultado['errors'] = $errors;
                
        return $resultado;
    }
    
    /**
     * Se registran prestaciones (Subsidios)
     * @param array $lista_personas
     * @return array
     */
    private function registrarPrestacion($lista_personas){
        $cant_registros = 0;
        $resultado = array();
        $errors = array();
        foreach ($lista_personas as $persona) {
            //armamos el seteo de la fecha
            $fecha = \DateTime::createFromFormat('dmY',$persona['prestacion']['fecha']);
            $create_at = $fecha->format('Y-m-d');
            
            $prestacion = new Prestacion();            
            $prestacion->monto = $persona['prestacion']['monto'];
            $prestacion->personaid = $persona['id'];
            $prestacion->create_at = $create_at;
            $prestacion->observacion = $persona['prestacion']['observacion'];
                        
            if(!$prestacion->save()){
                $error = $prestacion->errors;
                $error['persona'] = $persona['nombre']." ".$persona['apellido']." cuil:".$persona['cuil'];
                $errors[] = $error;
            }else{
                $cant_registros++;
            }
        }
        
        $resultado['registradas'] = $cant_registros;
        $resultado['errors'] = $errors;
        
        return $resultado;
    }


    /**
     * Se registra persona sin validaciones locales, es decir, que las validaciones son hechas por el sistema registral
     * @param array $persona
     * @return int
     * @throws Exception
     */
    private function importarPersona($persona) {
        
        //Buscar Localidad de la persona para realizar la integridad correspondiente
        if(isset($persona['lugar']['localidad']) && !empty($persona['lugar']['localidad'])){
            $localidadEncontrada = LugarForm::buscarLocalidadEnSistemaLugar(['nombre'=>$persona['lugar']['localidad'],'provinciaid'=>16]);

            if($localidadEncontrada == null){
                $resultado['mensaje'] = 'No existe la localidad de '.$persona['apellido'] .' '.$persona['nombre'] .' (cuil '.$persona['cuil'].')';
                return $resultado;
            }else{
                //integramos localidadid en persona
                $persona['lugar']['localidadid'] = $localidadEncontrada[0]['id'];
            }
        }else{
            $resultado = $persona;
            $resultado['mensaje'] = 'Falta localidad';
            return $resultado;
        }
          
        /*************** Ejecutamos la interoperabilidad ************************/
        //Si es una persona con id entonces ya existe en Registral
        if(isset($persona['id']) && !empty($persona['id'])){
            $resultado = \Yii::$app->registral->actualizarPersona($persona);
            if(isset($resultado->message)){
                $resultado = $resultado->message;
            }else{
                $resultado['success'] = true;
                $resultado['mensaje'] = $resultado['mensaje'] = 'Se actualiza los datos de '.$persona['apellido'] .' '.$persona['nombre'] .' (cuil '.$persona['cuil'].')';
            }
        }else{
            $personaRegistrada = \Yii::$app->registral->crearPersona($persona);
            if(isset($personaRegistrada->message)){
                $resultado = $personaRegistrada->message;
            }else{
                $resultado['success'] = true;
                $resultado['mensaje'] = $resultado['mensaje'] = 'Se registran datos de '.$persona['apellido'] .' '.$persona['nombre'] .' (cuil '.$persona['cuil'].')';
            }
        }
        
        return $resultado;
    }
}