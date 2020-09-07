<?php

namespace app\models;

use Yii;
use \app\models\base\SubSucursal as BaseSubSucursal;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sub_sucursal".
 */
class SubSucursal extends BaseSubSucursal
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
    
    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [
            'nombre'=> function($model){
                return $model->localidad. ' (Suc. '.$this->sucursal->nombre.')';
            },
            'sucursal_codigo'=> function($model){
                return $this->sucursal->codigo;
            }
        ]);
        
    }
}
