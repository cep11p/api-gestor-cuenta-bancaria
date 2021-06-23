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
            $ctaBps_array = preg_split('/\n|\r\n?/', $content); 

            
            $listaPersona = array();
            $nombre_apellido = array();
            foreach ($ctaBps_array as $value) {
                //Si viene una linea vacia saltamos la iteracion
                if(empty($value)){
                    break;
                }

                //iniciamos la cadena, donde empieza el numero del convenio 8180 
                $value = substr($value,strpos($value,'8180'));

                $row = array();
                $row['convenio'] = trim(substr($value, 0, 4));
                $row['apellido'] = trim(utf8_encode(substr($value, 4, 30)));
                $row['nombre'] = trim(utf8_encode(substr($value, 34, 16)));
                $row['nro_documento'] = preg_replace('/^0+/', '', trim(utf8_encode(substr($value, 62, 8))));
                $row['nacionalidad'] = trim(utf8_encode(substr($value, 72, 1)));
                $row['nacionalidadid'] = ($row['nacionalidad']=='A')?self::NACIONALIDADID_ARGENTINO: self::NACIONALIDADID_OTRO;
                $row['fecha_nacimiento'] = trim(utf8_encode(substr($value, 73, 8)));
                $row['sexo'] = trim(utf8_encode(substr($value, 81, 1)));
                $row['sexoid'] = ($row['sexo']=='M')? self::SEXO_MASCULINO: self::SEXO_FEMENINO;
                $row['estado_civil'] = trim(utf8_encode(substr($value, 82, 1)));
                $row['estado_civilid'] = self::ESTADO_CIVIL_SOLTERO;
                $row['cuil'] = trim(substr($value, 182, 11));
                $row['lugar']['calle'] = trim(utf8_encode(substr($value, 83, 19)));
                $row['lugar']['altura'] = intval(trim(substr($value, 102, 9)));
                $row['lugar']['localidad'] = trim(substr($value, 111, 30));
                $row['lugar']['codigo_postal'] = intval(trim(substr($value, 141, 5)));
                $row['prestacion']['monto'] = intval(trim(substr($value, 193, 5)));
                $row['prestacion']['fecha'] = trim(substr($value, 216, 8));
                $row['cuenta']['tipo_inscripcionid'] = trim(substr($value, 179, 3));
                $row['cuenta']['tipo_cuentaid'] = trim(utf8_encode(substr($value, 50, 3)));
                $row['cuenta']['cbu'] = trim(substr($value, 244, 27));
                $row['cuenta']['sub_sucursalid'] = trim(substr($value, 149, 3));
                $listaPersona[] = $row;
            }

            $resultado = $this->registrarListaPersonaConCBU($listaPersona);
        } else {
            throw new \yii\web\HttpException(400, json_encode($this->errors));
        }
        
        return $resultado;
    }
    
    /**
     * Se identifican las personas por cuil y se les crea una cuanta bancaria
     * @param array $lista_persona_bps
     */
    private function registrarListaPersonaConCBU($lista_persona_bps){

        $resultado = array();
        $cuils='';
        foreach ($lista_persona_bps as $persona) {
            //buscamos persona por lista de cuils
            $cuils .= (empty($cuils))?$persona['cuil']:','.$persona['cuil'];
        }
        
        $lista_persona_encontrada = PersonaForm::buscarPersonaEnRegistral(['cuils'=>$cuils,'pagesize'=>5000]);
        
        //vinculamos los datos bancarios correspondientes a las personas encontradas 
        $i=0;
        foreach ($lista_persona_encontrada as $persona) {
            foreach ($lista_persona_bps as $persona_bps) {
                if(isset($persona['cuil']) && isset($persona_bps['cuil']) && $persona['cuil']==$persona_bps['cuil']){                    
                    $lista_persona_encontrada[$i]['cuenta']['cbu'] = $persona_bps['cuenta']['cbu'];
                    $lista_persona_encontrada[$i]['cuenta']['tipo_inscripcionid'] = $persona_bps['cuenta']['tipo_inscripcionid'];
                    $lista_persona_encontrada[$i]['cuenta']['tipo_cuentaid'] = $persona_bps['cuenta']['tipo_cuentaid'];
                    $lista_persona_encontrada[$i]['cuenta']['sub_sucursalid'] = $persona_bps['cuenta']['sub_sucursalid'];
                    $lista_persona_encontrada[$i]['prestacion']['monto'] = $persona_bps['prestacion']['monto'];
                    $lista_persona_encontrada[$i]['prestacion']['fecha'] = $persona_bps['prestacion']['fecha'];
                    $lista_persona_encontrada[$i]['prestacion']['observacion'] = 'Prestación creada desde un archivo CTABPS.txt';
                    break;
                }
            }
            $i++;
        }
        
        //Separamos las personas que aun no existen
        $i=0;
        foreach ($lista_persona_bps as $persona_bps) {
            foreach ($lista_persona_encontrada as $persona) {
                if(isset($persona['cuil']) && isset($persona_bps['cuil']) && $persona['cuil']==$persona_bps['cuil']){                    
                    unset($lista_persona_bps[$i]);
                    break;
                }
            }
            $i++;
        }
        
        //registramos la cuenta bancaria de la persona
        $resultado = $this->crearCuentas($lista_persona_encontrada);
        
        //Se notifican las personas que aun no estan registradas
        $error_persona = array();
        foreach ($lista_persona_bps as $persona) {
            $resultado['errors'][] = "No se encuentra registrada la persona ".$persona['nombre']." ".$persona['apellido']." cuil:".$persona['cuil'];
        }
                

        return $resultado;
        
    }
    
    /**
     * Se crean cuentas bancarias masivamente con una lista de personas
     * @param array $lista_personas
     */
    private function crearCuentas($lista_personas){
        $cant_cuentas = count($lista_personas);
        $cant_registros = 0;
        $resultado = array();
        $errors = array();
        $i=0;
        foreach ($lista_personas as $persona) {
            $cuenta = new Cuenta();
            $cuenta->personaid = intval($persona['id']);
            $cuenta->bancoid = self::BANCO_PATAGONIA;
            $cuenta->tipo_cuentaid = self::CAJA_AHORRO;
            $cuenta->cbu = $persona['cuenta']['cbu'];
            $cuenta->create_at = date('Y-m-d H:m:s');

            #Chequeamos si la persona a importar paso por cuentaSaldo
            $error_cuenta = '';
            $prestacion = Prestacion::findOne(['personaid' => $persona['id']]);
            
            if($prestacion == Null){
                $error_cuenta = " debe ser registrada por cuenta saldo";
            }else{

                
                $prestacion->scenario = Prestacion::SCENARIO_IMPORTADO_BPS;
                $prestacion->estado = Prestacion::CON_CBU;
                
                if(!$prestacion->save()){
                    $prestacion_errores = Help::ArrayErrorsToString($prestacion->errors);                    
                    throw new \yii\web\HttpException(400, json_encode($prestacion_errores));
                }
                
                
                #Chequeamos si el CBU ya existe
                if(Cuenta::findOne(['cbu' => $cuenta->cbu]) != Null){
                    $error_cuenta .= (!empty($error_cuenta))?" y tiene vinculado un cbu ajeno":" tiene vinculado un cbu ajeno";
                }
                
                if(!empty($error_cuenta)){
                    $resultado['errors'][] = "$i La persona ".$persona['nombre']." ".$persona['apellido']." cuil:".$persona['cuil'].$error_cuenta;
                }
                
                if(!$cuenta->save()){
                    $error = $cuenta->errors;
                    $error['persona'] = $persona['nombre']." ".$persona['apellido']." cuil:".$persona['cuil'];
                    $errors[] = $error;
                }else{
                    $cant_registros++;
                }
            }
            $i++;
        }
        
        $resultado['creadas'] = $cant_registros;
        $resultado['existen'] = count($errors);
                
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