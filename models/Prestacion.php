<?php

namespace app\models;

use Yii;
use \app\models\base\Prestacion as BasePrestacion;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "prestacion".
 */
class Prestacion extends BasePrestacion
{
    const SIN_CBU=0;
    const CON_CBU=1;
    const EN_TESORERIA=2;
    const PREPARADO_A_EXPORTAR=4;

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
    
    public function setAttributesCustom($values) {
        parent::setAttributes($values);
        $this->create_at = date('Y-m-d H:m:i');
        
        if(empty($this->fecha_ingreso)){
            $this->fecha_ingreso = date('Y-m-d');
        }
        
        //chequeamos si la persona tiene cuenta con cbu para definir el estado de la prestacion
        $cuenta = Cuenta::findOne(['personaid'=> $this->personaid]);
        if(isset($cuenta)){
            $this->estado = $this::CON_CBU;
        }else{
            $this->estado = $this::SIN_CBU;
        }
    }
}
