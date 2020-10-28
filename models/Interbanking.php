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
                '2                      DDDDDDDDDDDDDDDDDDDDDDDDDDDDDSNNTTTTTTTTTTTXXXXXXXXXXXXXXXXXXXXXXRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR',
                '2                      DDDDDDDDDDDDDDDDDDDDDDDDDDDDDSNNTTTTTTTTTTTXXXXXXXXXXXXXXXXXXXXXXRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR',
                '2                      DDDDDDDDDDDDDDDDDDDDDDDDDDDDDSNNTTTTTTTTTTTXXXXXXXXXXXXXXXXXXXXXXRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR',
                '2                      DDDDDDDDDDDDDDDDDDDDDDDDDDDDDSNNTTTTTTTTTTTXXXXXXXXXXXXXXXXXXXXXXRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR',
            ];
        $model = new Interbanking();
        $model->setAttributes($params);
        $model->getInterbakingTxt($prestaciones);
        
         
        die();
    }
    
    public function getInterbakingTxt($params) {
        $interbankin_txt = '1'.$this->codigo_cliente."\n";
        $final_txt = '3'.$this->codigo_cliente.str_pad(count($params), 6, "0", STR_PAD_LEFT);
        foreach ($params as $value) {
            $interbankin_txt .=$value."\n";
        }
        $interbankin_txt .= $final_txt;
        
        print_r($interbankin_txt);die();
    }
    
    
}
