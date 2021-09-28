<?php

namespace app\rbac;

use app\models\TipoConvenio;
use Yii;

/**
 * Comprueba si un usuario pertenece al convenio
 */
class PrestacionVer
{
    /**
    * Se filtran los convenio según los permisos del usuario
    *
    * @return array
    */
    static function setCondicionPrestacionVer($table = 'prestacion'){
        $convenioid = [];
        $lista_convenio = TipoConvenio::find()->asArray()->all();

        foreach ($lista_convenio as $value) {
            if(Yii::$app->user->can('prestacion_ver',$value['id'])){
                $convenioid[] = $value['id'];
            }
        }
        
        return [$table.'.convenioid'=>$convenioid];
    }
}