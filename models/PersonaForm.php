<?php

namespace app\models;


use yii\helpers\ArrayHelper;
use Yii;
use yii\base\Model;

use yii\base\Exception;

/**
 * This is the model class for table "persona".
 */
class PersonaForm extends Model
{
    public $id;
    public $nombre;
    public $apellido;
    public $nro_documento;
    public $fecha_nacimiento;
    public $estado_civilid;
    public $telefono;
    public $celular;
    public $sexoid;
    public $tipo_documentoid;
    public $nucleoid;
    public $situacion_laboralid;
    public $generoid;
    public $email;
    public $red_social;
    public $cuil;
    public $nacionalidadid;

    public function rules()
    {
        return [
                        
            [['nombre', 'apellido','nro_documento','fecha_nacimiento','cuil'], 'required'],
            [['estado_civilid', 'sexoid', 'tipo_documentoid', 'nucleoid', 'situacion_laboralid', 'generoid','id','nacionalidadid'], 'integer'],
            [['nombre', 'apellido', 'nro_documento', 'telefono', 'celular'], 'string', 'max' => 45],
            [['cuil'], 'string', 'max' => 20],
            [['email','red_social'], 'string', 'max' => 200],            
            [['email'], 'email'],
            [['fecha_nacimiento'], 'date', 'format' => 'php:Y-m-d'],
            ['nro_documento', 'match', 'pattern' => "/^[0-9]+$/"]
        ];
    }
    
    
    public function save(){
        
        $resultado = false;
        if($this->validate()){
            $resultado = true;
            if(isset($this->id) && !empty($this->id)){
                $personaid = intval(\Yii::$app->registral->actualizarPersona($this->toArray()));
                $this->id = $personaid;
            }else{
                $personaid = intval(\Yii::$app->registral->crearPersona($this->toArray()));
                $this->id = $personaid;
            }
        }
        
        return $resultado;
    }
    
    
    
    /**
     * Ademas de registrar los datos personales, se registran los datos del hogar
     * @param array $param
     * @param bool $safeOnly
     * @throws Exception
     */
    public function setAttributes($param, $safeOnly = true) {
        /*** Persona ***/
        parent::setAttributes($param);
        
        /*Fecha Nacimiento*/
        if(isset($param['fecha_nacimiento']) && !empty($param['fecha_nacimiento'])){
            $this->fecha_nacimiento = Yii::$app->formatter->asDate($param['fecha_nacimiento'], 'php:Y-m-d');
        }  
        
    }
    
    /**
     * Se reciben los parametros de contactos + id y se hace un update interoperable con el sistema regrital
     * @param array $param
     * @throws Exception
     */
    public function setContactoAndSave($param) {
        
        ### Filtramos los parametros relevantes a contacto ###
        
        /*id*/
        if(isset($param['id']) && !empty($param['id'])){
            $parametros['id'] = $param['id'];
        } 
        
        /*email*/
        if(isset($param['email']) && !empty($param['email'])){
            $parametros['email'] = $param['email'];
        }  
        
        /*telefono*/
        if(isset($param['telefono']) && !empty($param['telefono'])){
            $parametros['telefono'] = $param['telefono'];
        }  
        
        /*celular*/
        if(isset($param['celular']) && !empty($param['celular'])){
            $parametros['celular'] = $param['celular'];
        }
        
        /*lista de redes sociales*/
        if(isset($param['lista_red_social']) && !empty($param['lista_red_social'])){
            $parametros['lista_red_social'] = $param['lista_red_social'];
        }  
                
        $resultado = \Yii::$app->registral->actualizarPersona($parametros);
        if(isset($resultado->message)){
            throw new Exception($resultado->message);
        }
        $this->id = intval($resultado);
        
    }
    
    public function setAttributesAndSave($param = array()) {
        $arrayErrors = [];
        
        ####### Instanciamos atributos de PersonaForm #########
        $this->setAttributes($param);
        if(!$this->validate()){
            $arrayErrors = ArrayHelper::merge($arrayErrors, $this->getErrors());
        }   
        
        ####### Instanciamos atributos de LugarForm #########
        $lugarForm = new LugarForm();
        if(isset($param['lugar'])){
            $lugarForm->setAttributes($param['lugar']);
        }                
        
        if(!$lugarForm->validate()){
            $arrayErrors=ArrayHelper::merge($arrayErrors, $lugarForm->getErrors());
        } 
        
        ###### chequeamos si existen errores ###############        
        if(count($arrayErrors)>0){
            throw new Exception(json_encode($arrayErrors));
        }
        
        #Preparamos los parametros para interoperar con registral
        $param_persona = $this->toArray();
        $param_persona['estudios'] = (isset($param['estudios']))?$param['estudios']:array();
        $param_persona['lista_red_social'] = (isset($param['lista_red_social']))?$param['lista_red_social']:array();
        $param_persona['lugar'] = $lugarForm->toArray();
        
        /*************** Ejecutamos la interoperabilidad ************************/
        //Si es una persona con id entonces ya existe en Registral
        if(isset($this->id) && !empty($this->id)){
            $resultado = \Yii::$app->registral->actualizarPersona($param_persona);
            if(isset($resultado->message)){
                throw new Exception($resultado->message);
            }
            $this->id = intval($resultado);
            
        }else{
            $resultado = \Yii::$app->registral->crearPersona($param_persona);
            if(isset($resultado->message)){
                throw new Exception($resultado->message);
            }
            $this->id = intval($resultado);
        }
        
    }
    /**
     * Se registra persona sin validaciones locales, es decir que, las validaciones son hechas por el sistema registral
     * @param array $param
     * @throws Exception
     * @return id
     */
    static function registrarSinValidar($param = array()) {
        $id = '';
        
        ####### Instanciamos atributos de PersonaForm #########
        $this->setAttributes($param);
        
        ####### Instanciamos atributos de LugarForm #########
        if(isset($param['lugar'])){
            $lugarForm = new LugarForm();
            $lugarForm->setAttributes($param['lugar']);
        }        
        
        #Preparamos los parametros para interoperar con registral
        $param_persona = $this->toArray();
        $param_persona['estudios'] = (isset($param['estudios']))?$param['estudios']:array();
        $param_persona['lista_red_social'] = (isset($param['lista_red_social']))?$param['lista_red_social']:array();
        $param_persona['lugar'] = $lugarForm->toArray();
        
        /*************** Ejecutamos la interoperabilidad ************************/
        //Si es una persona con id entonces ya existe en Registral
        if(isset($this->id) && !empty($this->id)){
            $resultado = \Yii::$app->registral->actualizarPersona($param_persona);
            if(isset($resultado->message)){
                throw new Exception($resultado->message);
            }
            $id = intval($resultado);
            
        }else{
            $resultado = \Yii::$app->registral->crearPersona($param_persona);
            if(isset($resultado->message)){
                throw new Exception($resultado->message);
            }
            $id = intval($resultado);
        }
        
        return $id;
    }
    
    /**
     * Se instancia un estudio y se valida y luego se serializa como 
     * parametro con el fin de ser registrado con interoperabilidad
     * @param array $param
     * @return array
     * @throws Exception si el estuio no es valido, creamos una excepcion con los errores
     */
    public function serializarEstudio($param){
        
        $estudioForm = new EstudioForm();
        $estudioForm->setAttributes($param);
        
        if(!$estudioForm->validate()){
            throw new Exception(json_encode($estudioForm->getErrors()));
        }
        
        return $estudioForm->toArray();
    }
    
    
    static function buscarPersonaPorIdEnRegistral($id){
        $response = \Yii::$app->registral->buscarPersonaPorId($id); 
        
        if(count($response['lugar'])<1){
            unset($response['lugar']);
        }

        if(count($response['hogar'])<1){
            unset($response['hogar']);
        }

        return $response;
    }
     
    /**
     * 
     * @param array $param
     * @return array
     */
    static function buscarPersonaEnRegistral($param){
        $resultado = array();
        $response = \Yii::$app->registral->buscarPersona($param); 
        
        if(isset($response['estado']) && $response['estado']==true){
            
            foreach ($response['resultado'] as $persona) {                
                unset($persona['hogar']);
                
                $resultado[] = $persona;
            }
        }
        
        return $resultado;
    }
    
    /**
     * Se obtiene un listado de personas con datos limpios junto con su paginacion 
     *
     * @param [array] $param
     * @return void
     */
    static function buscarPersonaEnRegistralConPaginacion($param){
        $response = \Yii::$app->registral->buscarPersona($param); 
        
        if(isset($response['estado']) && $response['estado']==true){
            $i=0;
            foreach ($response['resultado'] as $persona) {                
                unset($persona['hogar']);
                
                if(count($persona['lugar'])<1){
                    unset($persona['lugar']);
                }
                $response['resultado'][$i] = $persona;
                $i++;
            }
        }else{
            $response['success']=false;
            $response['total_filtrado']=0;            
            $response['resultado']=[];
            $response['message']="No se encontró ninguna persona!";   
        }
        
        return $response;
    }
    
    /**
     * Cuando obtenemos una Persona por interoperabilidad, en el resultado viene un array llamado lugar, 
     * donde este hace referencia a los datos de direccion o georeferencias
     * @param int $id este atributo hace referencia a una persona
     * @return array Devolvemos el lugar que asociado la persona intanciada
     */
    public function getLugar($id){
        $resultado = null;
        $response = \Yii::$app->registral->buscarPersonaPorId($id);
        
        if(isset($response['estado']) && $response['estado']==true){
            $personaArray = $response['resultado'][0];
            
            if(isset($personaArray['lugar'])){
                $resultado = $personaArray['lugar'];
            }
            
        }
        
        return $resultado;
    }
    
    /**
     * Se serializa los datos Persona,Estudios y Lugar para ser mostrados.
     * NOTA! Tener encuenta que Estudio y Lugar no son partes de PersonaForm
     * @return array devuelven datos para ser mostrados, caso contrario, se devuelve un array vacio
     */
    public function obtenerPersonaConLugarYEstudios($id = null){
        
        if($id){
            $response = \Yii::$app->registral->buscarPersonaPorId($id); 
        }else{
            $response = \Yii::$app->registral->buscarPersonaPorId($this->id);
        }
         
        
        $personaArray = array();
        if(isset($response['estado']) && $response['estado']==true){
            $personaArray = $response['resultado'][0];
            
            #Sacamos el parametro lugar que para pril es irrelevante
            unset($personaArray['apodo']);
            unset($personaArray['hogar']);
        }
        
        return $personaArray;
    }

    /**
     * 
     * @param array $param
     */
    public function agregarEstudios($param) {
        /**Seteamos uno o mas Estudios**/
        //limpiamos la coleccion vieja de estudios
        Estudio::deleteAll(['personaid'=>$this->id]);         
        foreach ($param as $est){

            $estudio = new Estudio();
            $estudio->setAttributes($est);
            $estudio->personaid = $this->id;
            if(!$estudio->save()){
                $arrayErrors['estudios']=$estudio->getErrors();
                $arrayErrors['tab']='estudios';
                $resultado['success']=false;
                throw new Exception(json_encode($arrayErrors));
            }
        }
    }
    
    /**
     * Se busca una persona por nro de documento
     */
    public function BuscarPersonaPorNroDocumentoEnRegistral($nro_documento){
        $resultado = array();
        $response = \Yii::$app->registral->buscarPersonaPorNroDocumento($nro_documento);
        foreach ($response as $value) {
            $resultado = $value;
        }
        
        return $resultado;
    }
    
    /**
     * vamos a cheaquear si existen cambios en los atributos
     */
    public function existeModificacion($params){
        $existeModificacion = false;
        foreach ($this->attributes as $key => $value) {
            if($params[$key] != $value){
                $existeModificacion = true;
            }
        }
        return $existeModificacion;
    }
       
}
