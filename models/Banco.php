<?php

namespace app\models;

use Yii;
use \app\models\base\Banco as BaseBanco;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "banco".
 */
class Banco extends BaseBanco
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
