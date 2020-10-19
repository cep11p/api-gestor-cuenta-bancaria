<?php

namespace app\models;

use Yii;
use \app\models\base\Cuenta as BaseCuenta;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cuenta".
 */
class Cuenta extends BaseCuenta
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
    
    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [
            'banco'=> function($model){
                return $model->banco->nombre;
            },
            'tipo_cuenta'=> function($model){
                return $model->tipoCuenta->nombre;
            }
        ]);
        
    }
    
    static function vincularCuenta($lista_persona) {
        $ids = '';
        $CuentaSearch = new CuentaSearch();
        /******** Instancia con Persona ***************************/
        //hacemos instancia con todas las persoans
        foreach ($lista_persona as $value) {
            //nos comunicamos con registrar para obtener lista de personas
            $ids .= (empty($ids))?$value['id']:','.$value['id'];
        }
        
        $lista_cuenta = $CuentaSearch->search(['persona_ids'=>$ids]);
        
        //vamos a vincular cuentas a las personas correspondiente
        $i=0;
        foreach ($lista_cuenta as $value) {
            foreach ($lista_persona as $persona) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $lista_persona[$i]['lista_cuenta'][] = $value;
                    break;
                }
                
            }
            $i++;
        }
        
        //Vamos a chequear que persona no tiene una cuenta bancaria para crear un lista vacia
        $i=0;
        foreach ($lista_persona as $persona) {
            if(!isset($persona['lista_cuenta'])){
                $lista_persona[$i]['lista_cuenta'] = array();
                break;
            }
            $i++;
        }
        
        return $lista_persona;
    }
}
