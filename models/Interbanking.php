<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\base\Exception;

/**
 * Esta clase nos ayuda con el armado de una extructura de documento a exportar "Export".
 */
class Interbanking extends Model
{

    const NACIONALIDAD_ARGENTINA = 1;
    
    public $codigo_cliente;

    public function rules()
    {
        return [
            [['required'], 'required'],
            [['codigo_cliente'], 'string', 'max' => 7],
        ];
    }
    
    /**
     * Se exporta el archivo interbaking
     * @throws \yii\web\HttpException
     */
    public static function exportar($params){
        $model = new Interbanking();
        $model->setAttributes($params);

        $lista_ids = (isset($params['lista_ids']) && !empty($params['lista_ids']))?$params['lista_ids']:'';

        if($lista_ids==''){
            $lista_cuenta = Cuenta::find()->limit(500)->asArray()->where(['tesoreria_alta'=>0])->all();
            self::registrarExportacion($lista_cuenta);
        }else{
            $lista_ids = explode(',',$lista_ids);
            $lista_cuenta = Cuenta::find()->limit(500)->asArray()->where(['id'=>$lista_ids])->all();
        }

        $lista_cuenta = Cuenta::vincularPropietario($lista_cuenta);

        $resultado = $model->getInterbakingTxt($lista_cuenta);
         
        return $resultado;
    }
    
    public function getInterbakingTxt($lista_cuenta = []) {
        $this->codigo_cliente = 'CLIENTE';
        $interbankin_txt = '1'.$this->codigo_cliente."\n";
        
        //obtenemos los datos del propietario de cada cuenta
        
        $final_txt = '3'.$this->codigo_cliente.str_pad(count($lista_cuenta), 6, "0", STR_PAD_LEFT);
        
        foreach ($lista_cuenta as $value) {
            $interbankin_txt .="2".str_pad("", 51, " ", STR_PAD_LEFT)."SNN".$value['cuil'].$value['cbu']."\n";
            $cuenta = Cuenta::findOne(["id"=>$value['id']]);
            $cuenta->tesoreria_alta = 1;
            $cuenta->save();
        }
        $interbankin_txt .= $final_txt;
        
        return $interbankin_txt;
    }

    public static function registrarExportacion($lista_cuenta){
        $lista_ids = '';
        foreach ($lista_cuenta as $value) {
            $lista_ids .= ($lista_ids=='')?strval($value['id']):",".strval($value['id']);
        }

        #registramos la exportacion
        $export = new Export();
        $export->lista_ids = $lista_ids;
        $export->tipo = Export::TIPO_INTERBANKING;

        if(!$export->save()){
            throw new \yii\web\HttpException(400, json_encode($export->errors));
        }
    }
    
    /**
     * Instanciamos los datos del propientario de la cuenta desde una lista de cuentas
     * @param array $params Lista de cuentas
     * @throws \yii\web\HttpException
     * @return array Se devuelve una lista de cuenta con los datos del propietario
     */
    // public function getDatosCuentas($lista_ids = '') {

    //     if($lista_ids==''){
    //         $lista_cuenta = Cuenta::find()->limit(500)->asArray()->where(['tesoreria_alta'=>0])->all();
    //         self::registrarExportacion($lista_cuenta);
    //     }else{
    //         $lista_ids = explode(',',$lista_ids);
    //         $lista_cuenta = Cuenta::find()->limit(500)->asArray()->where(['id'=>$lista_ids])->all();
    //     }

    //     //obtenemos la lista de cuentas que no fueron dadas de alta en tesoreria
    //     $lista_cuenta = Cuenta::vincularPropietario($lista_cuenta);
        
    //     if(empty($lista_cuenta)){
    //         throw new \yii\web\HttpException(400, 'No se encontraron cuentas para exportar a tesoreria');
    //     }
        
    //     return $lista_cuenta;
    // }
    
    
}
