<?php

namespace app\models;

use Yii;
use \app\models\base\UserPersona as BaseUserPersona;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_persona".
 */
class UserPersona extends BaseUserPersona
{

    public function getPersona(){
        $resultado = array();
        $data = \Yii::$app->registral->viewPersona($this->personaid);
        if(count($data)>0){
            $resultado['nombre'] = $data['nombre'];
            $resultado['apellido'] = $data['apellido'];
            $resultado['nro_documento'] = $data['nro_documento'];
            $resultado['cuil'] = $data['cuil'];
        }

        return $resultado;
    }

    public function getLocalidad(){
        $resultado = array();
        $data = \Yii::$app->lugar->buscarLocalidadPorId($this->localidadid);
        if(count($data)>0){
            $resultado = $data['nombre'];
        }

        return $resultado;
    }

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # vinculamos el audit
                'bedezign\yii2\audit\AuditTrailBehavior',
            ]
        );
    }

    public function getTipoConvenios(){
        $model = UsuarioHasConvenio::find()->select('tipo_convenioid ')->distinct('tipo_convenioid')->where(['userid'=>$this->userid])->asArray()->all();
        $lista_ids = [];
        $lista_tipo_convenio = [];
        foreach ($model as $value) {
            $lista_ids[] = intval($value['tipo_convenioid']);
        }

        $lista_tipo_convenio = TipoConvenio::find()->where(['id' => $lista_ids])->asArray()->all();

        return (count($lista_tipo_convenio)>0)?$lista_tipo_convenio:[];
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
