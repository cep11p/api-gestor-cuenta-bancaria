<?php

namespace app\models;

use Yii;
use \app\models\base\TipoConvenio as BaseTipoConvenio;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tipo_convenio".
 */
class TipoConvenio extends BaseTipoConvenio
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
