<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "Lugar".
 */
class BackendLocalidad extends Model
{
    
    static function setFlagLocalidadExtra($lista){
        #pedimos las localidades extras
        $lista_localidad_extra = \Yii::$app->lugar->buscarLocalidadExtra([]);
        #Seteamos el flag
        $i = 0;
        foreach ($lista as $localidad) {
            $lista[$i]['extra'] = false;
            foreach ($lista_localidad_extra as $localidad_extra) {
                if($localidad['id'] == $localidad_extra['id']){
                    $lista[$i]['extra'] = true;
                }
            }
            $i++;
        }

        return $lista;
    } 
    
    
}
