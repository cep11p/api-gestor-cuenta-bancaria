<?php

namespace app\models;

use Yii;
use \app\models\base\TipoExport as BaseTipoExport;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tipo_export".
 */
class TipoExport extends BaseTipoExport
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
