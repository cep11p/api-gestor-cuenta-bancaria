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
