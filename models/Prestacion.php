<?php

namespace app\models;

use Yii;
use \app\models\base\Prestacion as BasePrestacion;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "prestacion".
 */
class Prestacion extends BasePrestacion
{
    const SIN_CBU=0;
    const CON_CBU=1;
    const EN_TESORERIA=2;
    const PREPARADO_A_EXPORTAR=4;

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }
    
    /**
     * Se registraran en la bd una lista de prestaciones
     * @param array $lista_prestaciones
     * @return array $resultado['cant_registros'], $resultado['errors']
     */
    static function crearPrestaciones($lista_prestaciones) {
        $cant_registros = 0;
        $resultado = array();
        $errors = array();
        
        foreach ($lista_prestaciones as $prestacion) {
            $model = new Prestacion();
            $model->personaid = intval($prestacion['personaid']);
            $model->monto = $prestacion['monto'];
            $model->create_at = date('Y-m-d H:m:i');
            $model->observacion = $prestacion['observacion'];
            $model->sub_sucursalid = $prestacion['sub_sucursalid'];
            $model->estado = $prestacion['estado'];
            $model->fecha_ingreso = $prestacion['fecha_ingreso'];
            
            if(!$model->save()){
                $error = $model->errors;
                $error['persona'] = $prestacion['nombre']." ".$prestacion['apellido']." cuil:".$prestacion['cuil'];
                $errors[] = $error;
            }else{
                $cant_registros++;
            }
        }
        
        
        $resultado['cant_registros'] = $cant_registros;
        $resultado['errors'] = $errors;
                
        return $resultado;
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
    
    public function setAttributesCustom($values) {
        parent::setAttributes($values);
        $this->create_at = date('Y-m-d H:m:i');
        
        if(empty($this->fecha_ingreso)){
            $this->fecha_ingreso = date('Y-m-d');
        }
        
        //chequeamos si la persona tiene cuenta con cbu para definir el estado de la prestacion
        $cuenta = Cuenta::findOne(['personaid'=> $this->personaid]);
        if(isset($cuenta)){
            $this->estado = $this::CON_CBU;
        }else{
            $this->estado = $this::SIN_CBU;
        }
    }
}
