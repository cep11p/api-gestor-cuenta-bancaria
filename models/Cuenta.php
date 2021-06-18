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
                # vinculamos el audit
                'bedezign\yii2\audit\AuditTrailBehavior',
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['cbu','validarCbu'],
                ['personaid','validarPersona']
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
                return isset($model->tipoCuenta->nombre)?$model->tipoCuenta->nombre:'';
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
        $lista_cuenta = (!empty($lista_cuenta['resultado']))?$lista_cuenta['resultado']:[];
        
        //vamos a vincular cuentas a las personas correspondiente
        foreach ($lista_cuenta as $value) {
            $i=0;
            foreach ($lista_persona as $persona) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $cuenta['id'] = $value['id'];
                    $cuenta['cbu'] = $value['cbu'];
                    $cuenta['banco'] = $value['banco'];
                    $cuenta['bancoid'] = $value['bancoid'];
                    $cuenta['tesoreria_alta'] = $value['tesoreria_alta'];
                    $cuenta['tipo_cuenta'] = $value['tipo_cuenta'];
                    $cuenta['tipo_cuentaid'] = $value['tipo_cuentaid'];
                    $lista_persona[$i]['lista_cuenta'][] = $cuenta;
                    $lista_persona[$i]['tiene_cbu'] = true;
                    break;
                }
                $i++;
            }
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
    public static function vincularPropietario($lista_cuenta) {
        $lista_cuil = [];
        $persona_ids = '';
        //obtenemos la lista de personas con su datos
        foreach ($lista_cuenta as $value) {
            //buscamos persona por lista de ids
            $persona_ids .= (empty($persona_ids))?$value['personaid']:','.$value['personaid'];
        }
        
        //obtenemos lista de persona con su id
        $lista_persona = PersonaForm::buscarPersonaEnRegistral(['ids'=>$persona_ids]);      
        
        //vinculamos el cuil en cada cuenta
        $i=0;
        foreach ($lista_cuenta as $value) {
            foreach ($lista_persona as $persona) {
                if(isset($persona['id']) && isset($value['personaid']) && $persona['id']==$value['personaid']){
                    $lista_cuenta[$i]['apellido'] = $persona['apellido'];
                    $lista_cuenta[$i]['nombre'] = $persona['nombre'];
                    $lista_cuenta[$i]['cuil'] = $persona['cuil'];
                    $lista_cuenta[$i]['nro_documento'] = $persona['nro_documento'];
                    $lista_cuenta[$i]['fecha_nacimiento'] = $persona['fecha_nacimiento'];
                    $lista_cuenta[$i]['estado_civil'] = $persona['estado_civil'];
                    $lista_cuenta[$i]['sexo'] = $persona['sexo'];
                    $lista_cuenta[$i]['telefono'] = $persona['telefono'];
                    $lista_cuenta[$i]['celular'] = $persona['celular'];
                    $lista_cuenta[$i]['email'] = $persona['email'];
                    
                    if(!empty($persona['lugar'])){
                        $lista_cuenta[$i]['lugar'] = $persona['lugar'];
                    }
                    break;
                }
            }
            $i++;
        }
        
        return $lista_cuenta;
    }

    public static function setOrigenConvenio($lista_cuenta) {    
        
        $lista_persona_ids = [];
        //vinculamos el cuil en cada cuenta
        foreach ($lista_cuenta as $value) {
            $lista_persona_ids[] = $value['personaid'];
        }

        // print_r($lista_persona_ids);die();
        $prestacion = Prestacion::findOne(['personaid'=>$this->personaid]);

        if(!is_null($prestacion)){
            throw new \yii\web\HttpException(400, 'No se puede borrar una cuenta que fue dado de alta por el convenio 8081');
        }
        
        return $lista_cuenta;
    }
    
    public function validarCbu($attribute, $params, $validator){

        if(isset($this->bancoid) && isset($this->cbu)){

            if(strlen($this->cbu) != 22){
                $this->addError('cbu','El CBU debe tener 22 digitos.');
            }
            
            #Validamos el codigo del banco del CBU
            $banco = substr($this->cbu, 0, 3);
            if($banco != $this->banco->codigo){
                $this->addError('cbu','No coincide el CBU con el banco.');
            }
            
        }
    }

    public function validarPersona(){
        if(isset($this->personaid) && isset($this->personaid)){
            
            #Validamos si la persona tiene pendiente el pedido de cbu por el convenio8081
            $convenio = Prestacion::findOne(['personaid' => $this->personaid]);
            if($convenio != NULL){
                $this->addError('personaid','La persona tiene una solicitud de CBU pendiente por el convenio 8081');
            }
            
            #Chequeamos que la persona no tenga una cuenta bancaria
            $cuenta = Cuenta::findOne(['personaid' => $this->personaid]);
            if($cuenta != NULL){
                $this->addError('personaid','La persona ya tiene una cuenta bancaria');
            }
            
        }
    }

    /**
     * Validamos si la cuenta es agregada a mano y se realiza el borrado
     *
     * @return void
     */
    public function borrarCuenta(){
        $resultado = false;
        $prestacion = Prestacion::findOne(['personaid'=>$this->personaid]);

        if(!is_null($prestacion)){
            throw new \yii\web\HttpException(400, 'No se puede borrar una cuenta que fue dado de alta por el convenio 8081');
        }
        
        if($this->delete()){
            $resultado = true;
        }

        return $resultado;
    }

    /**
     * Se chequea si el origen de la cuenta fue por convenio 8081
     *
     * @return void
     */
    public function origenConvenio(){
        $resultado = false;
        $prestacion = Prestacion::findOne(['personaid'=>$this->personaid]);

        if(!is_null($prestacion)){
            $resultado = true;
        }

        return $resultado;
    }
}
