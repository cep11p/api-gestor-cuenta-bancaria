<?php

namespace app\models;

use Yii;
use \app\models\base\Export as BaseExport;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "export".
 */
class Export extends BaseExport
{

    const TIPO_CUENTA_SALDO = 'ctasaldo';
    const TIPO_INTERBANKING = 'interbanking';

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

    /**
     * Realiza la reexportacion de lo que ya fue exportado
     *
     * @return void
     */
    public function exportar(){
        $resultado['exportacion'] = ''; 
        switch ($this->tipo) {
            case 'interbanking':

                #Chequeamos permiso
                if(!Yii::$app->user->can('interbanking_exportar')){
                    throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
                }
                
                $resultado['exportacion'] = Interbanking::exportar(['lista_ids'=>$this->lista_ids]);
                break;
            
            case 'ctasaldo':

                #Chequeamos permiso
                if(!Yii::$app->user->can('cuenta_saldo_exportar')){
                    throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
                }

                $resultado['exportacion'] = CuentaSaldo::reexportCtaSaldo($this->lista_ids);
                break;
        }

        return $resultado;
    }
}
