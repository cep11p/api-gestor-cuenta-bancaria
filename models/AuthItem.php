<?php

namespace app\models;

use Yii;
use \app\models\base\AuthItem as BaseAuthItem;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "auth_item".
 */
class AuthItem extends BaseAuthItem
{
    const ROLE = 1;
    const PERMISO = 2;

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
