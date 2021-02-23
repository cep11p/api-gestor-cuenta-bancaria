<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Herramienta extends Model
{

    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'ods,xlsx']
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
    
    public function importarCuentas() {
        $lista_persona = [];
        
        if(!$this->validate('file')){
            throw new \yii\web\HttpException(400, 'La formato del archivo debe ser ods o xlsx');
        }
        
        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($this->file->tempName);
        $valor = $spreadsheet->getActiveSheet()->getCell('A2');
        for($i=2;$i<=$spreadsheet->getActiveSheet()->getHighestRow();$i++){
            
            //Si existe el cuil instanciamos la persona
            if(!empty($spreadsheet->getActiveSheet()->getCell('D'.$i))){
                $persona['nro_documento'] = strval($spreadsheet->getActiveSheet()->getCell('A'.$i)->getValue());
                $persona['apellido'] = strtolower($spreadsheet->getActiveSheet()->getCell('B'.$i)->getValue());
                $persona['nombre'] = strtolower($spreadsheet->getActiveSheet()->getCell('C'.$i)->getValue());
                $persona['cuil'] = strval($spreadsheet->getActiveSheet()->getCell('D'.$i)->getValue());
                $persona['cbu'] = strval($spreadsheet->getActiveSheet()->getCell('E'.$i)->getValue());
                $lista_persona [] = $persona;
            }
        }
        $resultado = $this->registrarCuentaConPropietario($lista_persona);
        return $resultado;
    }

    public function registrarCuentaConPropietario($param) {
        $cantidad_cuenta_registrada = 0;
        $cantidad_cuenta_encontrada = 0;
        $cantidad_persona_registrada = 0;
        $cantidad_persona_encontrada = 0;
        $resultado = [];
        $resultado['errors'] = [];
        foreach ($param as $value) {
            $persona = \Yii::$app->registral->buscarPersona(['cuil'=>$value['cuil']]);
            
            //Si persona no existe
            if(empty($persona['resultado'])){
                //registramos nueva persona
                $registral_resultado = \Yii::$app->registral->crearPersona($value);
                if(is_numeric($registral_resultado)){
                    $cantidad_persona_registrada++;
                }
                
                //Registramos una Cuenta
                $persona = \Yii::$app->registral->buscarPersona(['cuil'=>$value['cuil']]);                
                if(isset($persona['resultado'][0]['id'])){
                    $personaid= $persona['resultado'][0]['id'];
                    
                    //chequeamos si la persona tiene Cbu
                    $existe_cuenta = Cuenta::findOne(['personaid'=> $personaid]);
                    if($existe_cuenta==null){
                        $cuenta = new Cuenta();
                        $cuenta->personaid = $personaid;
                        $cuenta->cbu = $value['cbu'];
                        $cuenta->bancoid = CtaBps::BANCO_PATAGONIA;
                        $cuenta->tipo_cuentaid = CtaBps::CUENTA_CORRIENTE;
                        $cuenta->create_at = date('Y-m-d H:i:s');

                        if(!$cuenta->save()){
                            $error['msj'] = 'No se pudo guardar la cuenta de la persona '.$value['cuil'];
                            $error['error'] = $cuenta->errors;
                            $resultado['errors'][] = $error;
                        }else{
                            //sumamos las cuentas registradas
                            $cantidad_cuenta_registrada++;
                        }
                    }else{
                        //sumamos las cuentas que ya existen
                        $cantidad_cuenta_encontrada++;
                    }
                    
                    
                }
            //Si la persona existe    
            }else{
                //Registramos una Cuenta de Persona existente
                $persona = \Yii::$app->registral->buscarPersona(['cuil'=>$value['cuil']]);                
                if(isset($persona['resultado'][0]['id'])){
                    //sumamos las personas encontradas
                    $cantidad_persona_encontrada++;
                    
                    $personaid= $persona['resultado'][0]['id'];
                    
                    //chequeamos si la persona tiene Cbu
                    $existe_cuenta = Cuenta::findOne(['personaid'=> $personaid]);
                    if($existe_cuenta==null){
                        $cuenta = new Cuenta();
                        $cuenta->personaid = $personaid;
                        $cuenta->cbu = $value['cbu'];
                        $cuenta->bancoid = CtaBps::BANCO_PATAGONIA;
                        $cuenta->tipo_cuentaid = CtaBps::CUENTA_CORRIENTE;
                        $cuenta->create_at = date('Y-m-d H:i:s');

                        if(!$cuenta->save()){
                            $error['msj'] = 'No se pudo guardar la cuenta de la persona '.$value['cuil'];
                            $error['error'] = $cuenta->errors;
                            $resultado['errors'][] = $error;
                        }else{
                            $cantidad_cuenta_registrada++;
                        }
                    }else{
                        $cantidad_cuenta_encontrada++;
                    }
                }
            }
        }
        
        $resultado['cuentas_registradas'] = $cantidad_cuenta_registrada;
        $resultado['cuentas_encontradas'] = $cantidad_cuenta_encontrada;
        $resultado['personas_registradas'] = $cantidad_persona_registrada;
        $resultado['personas_encontradas'] = $cantidad_persona_encontrada;
        return $resultado;
    }
}