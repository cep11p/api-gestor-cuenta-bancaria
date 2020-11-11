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
        $cuentas = (!empty($params['lista_cuenta']))?$params['lista_cuenta']:[];
        $model = new Interbanking();
        $model->setAttributes($params);
        $resultado = $model->getInterbakingTxt($cuentas);
         
        return $resultado;
    }
    
    public function getInterbakingTxt($params) {
        $this->codigo_cliente = 'CLIENTE';
        $interbankin_txt = '1'.$this->codigo_cliente."\n";
        $final_txt = '3'.$this->codigo_cliente.str_pad(count($params), 6, "0", STR_PAD_LEFT);
        
        //obtenemos los datos del propietario de cada cuenta
        $datos = $this->getDatosCuentas($params);
        
        foreach ($datos as $value) {
            $interbankin_txt .="2".str_pad("", 51, " ", STR_PAD_LEFT)."SNN".$value['cuil'].$value['cbu']."\n";
            $cuenta = Cuenta::findOne(["id"=>$value['id']]);
            $cuenta->tesoreria_alta = 1;
            $cuenta->save();
        }
        $interbankin_txt .= $final_txt;
        
        return $interbankin_txt;
    }
    
    /**
     * Instanciamos los datos del propientario de la cuenta desde una lista de cuentas
     * @param array $params Lista de cuentas
     * @throws \yii\web\HttpException
     * @return array Se devuelve una lista de cuenta con los datos del propietario
     */
    public function getDatosCuentas($params) {
        $resultado['resultado'] = [];
        $cuentaSearch = new CuentaSearch();
        $cuenta_ids='';
        foreach ($params as $value) {
            //buscamos cuentas por lista de ids
            $cuenta_ids .= (empty($cuenta_ids))?$value['id']:','.$value['id'];
        }
        
        
        //obtenemos la lista de cuentas que no fueron dadas de alta en tesoreria
        $lista_cuenta = $cuentaSearch->search(['tesoreria_alta'=>0]);
        
        if(empty($lista_cuenta['resultado'])){
            throw new \yii\web\HttpException(400, 'No se encontraron cuentas para exportar a tesoreria');
        }
        
        return $lista_cuenta['resultado'];
    }
    
    
}
