<?php

namespace app\models;

use Yii;
use \app\models\base\TipoCuenta as BaseTipoCuenta;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tipo_cuenta".
 */
class TipoCuenta extends BaseTipoCuenta
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
}
