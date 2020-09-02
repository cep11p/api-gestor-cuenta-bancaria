<?php

namespace app\models;

use Yii;
use \app\models\base\Cuenta as BaseCuenta;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cuenta".
 */
class Cuenta extends BaseCuenta
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
    
    public static function crearCtaSaldo($params){
        $resultado = [];

//        $ids='';
//        foreach ($params as $value) {
//            
//            if(!isset($value['personaid'])){
//                throw new Exception("Falta el id de una persona");
//            }
//            
//            $ids .= (empty($ids))?$value['personaid']:','.$value['personaid'];
//        }
//               
//        $data = \Yii::$app->registral->buscarPersona(array('ids'=>$ids,'pagezise'=> count($params)));
//        
//        if(count($data['resultado'])<1){
//            throw new Exception("Lista de personas vacia.");
//        }
//        $lista_persona = $data['resultado'];
        foreach ($params as $value) {
            
            //Se define la nacionalidad
            if($value['nacionalidad']=='argentino/a'){
                $nac = 'A';
            }else{
                $nac = 'E';
            }
            
            //Estructura de CTASLDO.TXT
            $convenio_apellido = str_pad('8180'.$value['apellido'], 34);
            $nombre = str_pad('8180'.$value['nombre'], 16);
            $tipo_documento = str_pad($value['tipo_documentoid'], 3, "0", STR_PAD_LEFT);
            $nro_documento = str_pad($value['nro_documento'], 17, "0", STR_PAD_LEFT);
            $nacionalidad = str_pad($nac, 3, "0", STR_PAD_LEFT);
            $fecha_nacimiento = $value['fecha_nacimiento'];
            $sexo = ($value['sexo']=='Masculino')?'M':'F';
            $estado_civil = 'S';
            $calle = str_pad($value['lugar']['calle'], 19);
            $altura = str_pad((str_pad($value['lugar']['altura'], 5, "0", STR_PAD_LEFT)),9);
            $localidad = str_pad(strtoupper($value['lugar']['localidad']), 30);
            $codigo_postal = str_pad(str_pad($value['lugar']['codigo_postal'].'16'.'2', 8, "0", STR_PAD_LEFT), 38); //codigopostal.provinciaid.tipocuenta
            $cuil = str_pad('008'.$value['cuil'].str_pad($value['saldo'], 5, "0", STR_PAD_LEFT), 37); //tipoincripcion.cuil.saldo
            $cuil = str_pad('008'.$value['cuil'].str_pad($value['saldo'], 5, "0", STR_PAD_LEFT), 37); //tipoincripcion.cuil.saldo
            
        }
        
                
        print_r($cuil);die();
        return $resultado;
    }
}
