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
        $cuentas = [
                ['id'=>1],
                ['id'=>2],
                ['id'=>3],
                ['id'=>5],
            ];
        $model = new Interbanking();
        $model->setAttributes($params);
        $model->getInterbakingTxt($cuentas);
        
         
        die();
    }
    
    public function getInterbakingTxt($params) {
        $interbankin_txt = '1'.$this->codigo_cliente."\n";
        $final_txt = '3'.$this->codigo_cliente.str_pad(count($params), 6, "0", STR_PAD_LEFT);
        
        //obtenemos los datos del propietario de cada cuenta
        $datos = $this->getDatosCuentas($params);
        
        print_r($datos);
        die();
        
        foreach ($params as $value) {
            $interbankin_txt .=$value."\n";
        }
        $interbankin_txt .= $final_txt;
        
        print_r($interbankin_txt);die();
    }
    
    /**
     * Instanciamos los datos del propientario de la cuenta desde una lista de cuentas
     * @param array $params Lista de cuentas
     * @throws \yii\web\HttpException
     * @return array Se devuelve una lista de cuenta con los datos del propietario
     */
    public function getDatosCuentas($params) {
        $resultado = [];
        $cuentaSearch = new CuentaSearch();
        $cuenta_ids='';
        foreach ($params as $value) {
            //buscamos cuentas por lista de ids
            $cuenta_ids .= (empty($cuenta_ids))?$value['id']:','.$value['id'];
        }
        
        
        //obtenemos la lista de cuentas con sus datos
        $lista_cuenta = $cuentaSearch->search(['ids'=>$cuenta_ids]);
        
        if(empty($lista_cuenta)){
            throw new \yii\web\HttpException(400, 'Lista de cuenta vacia');
        }
        
        $resultado = Cuenta::getCuentaYCuil($lista_cuenta);
        
        return $resultado;
    }
    
    
}
