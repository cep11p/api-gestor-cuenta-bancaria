<?php

namespace app\models;

use Yii;
use \app\models\base\UsuarioHasConvenio as BaseUsuarioHasConvenio;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "usuario_has_convenio".
 */
class UsuarioHasConvenio extends BaseUsuarioHasConvenio
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
