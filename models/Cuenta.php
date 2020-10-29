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
                    $lista_persona[$i]['tiene_cbu'] = true;
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
                $lista_persona[$i]['tiene_cbu'] = false;
                break;
            }
            $i++;
        }
        
        return $lista_persona;
    }
    
    /**
     * 
     * @param array $lista_cuenta lista de cuentas
     */
    public static function getPersonasConSusCuentas($lista_cuenta) {
        $persona_ids = '';
        //obtenemos la lista de personas con su datos
        foreach ($lista_cuenta as $value) {
            //buscamos persona por lista de ids
            $persona_ids .= (empty($persona_ids))?$value['personaid']:','.$value['personaid'];
        }
        
        $lista_persona = PersonaForm::buscarPersonaEnRegistral(['ids'=>$persona_ids]);
        $lista_persona = self::vincularCuenta($lista_persona);
        
        return $lista_persona;
    }
    
    /**
     * Desde una lista de cuentas vinculamos los datos del propietario (persona)
     * @param array $lista_cuenta
     * @return array
     */
    public static function getCuentaYCuil($lista_cuenta) {
        $lista_cuil = [];
        $persona_ids = '';
        //obtenemos la lista de personas con su datos
        foreach ($lista_cuenta as $value) {
            //buscamos persona por lista de ids
            $persona_ids .= (empty($persona_ids))?$value['personaid']:','.$value['personaid'];
        }
        
        //obtenemos lista de persona con su id
        $lista_persona = PersonaForm::buscarPersonaEnRegistral(['ids'=>$persona_ids]);        
        foreach ($lista_persona as $persona) {
            $array['id'] = $persona['id'];
            $array['cuil'] = $persona['cuil'];
            $array['apellido'] = $persona['apellido'];
            $array['nombre'] = $persona['nombre'];
            $lista_cuil[] = $array;
        }
        
        //vinculamos el cuil en cada cuenta
        $i=0;
        foreach ($lista_cuenta as $value) {
            foreach ($lista_cuil as $persona) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $lista_cuenta[$i]['cuil'] = $persona['cuil'];
                    $lista_cuenta[$i]['apellido'] = $persona['apellido'];
                    $lista_cuenta[$i]['nombre'] = $persona['nombre'];
                    break;
                }
            }
            $i++;
        }
        
        return $lista_cuenta;
    }
}
