<?php

namespace app\models;

use dektrium\user\models\User as ModelsUser;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 */
class User extends ModelsUser
{    
    const ADMIN = 'admin';
    const SOPORTE = 'soporte';
    const USUARIO = 'usuario';

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            []
        );
    }

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }
    
    static function limpiarPermisos($params){

        #Chequeamos que exista el usuario
        if(!isset($params['usuarioid']) || empty($params['usuarioid'])){
            throw new \yii\web\HttpException(400, json_encode(['error'=>['Falta el usuario']]));
        }

        #Chequeamos la lista de permisos
        if(!isset($params['lista_permiso']) || empty($params['lista_permiso'])){
            throw new \yii\web\HttpException(400, json_encode(['error'=>['Falta la lista de permisos (lista_permiso)']]));
        }

        #Borramos los permisos (auth_assigment)
        if(!empty($params['lista_permiso'])){
            AuthAssignment::deleteAll([
                'user_id'=>$params['usuarioid'],
                'item_name'=>$params['lista_permiso']
            ]);
        }
    }

    public static function setAsignacion($params){
        #Validamos que exista el usuario
        if(User::findOne(['id'=>$params['usuarioid']])==NULL){
            throw new \yii\web\HttpException(400, 'El usuario con el id '.$params['usuarioid'].' no existe!');
        }
        
        $transaction = Yii::$app->db->beginTransaction();
        try {
            SELF::limpiarPermisos($params);

            #Asignamos los permisos
            foreach ($params['lista_permiso'] as $value) {
                if((AuthAssignment::findOne(['item_name'=>$value['name'], 'user_id'=>strval($params['usuarioid'])])) === NULL){
                    $auth_assignment = new AuthAssignment();
                    $auth_assignment->setAttributes(['item_name'=>$value['name'],'user_id'=>strval($params['usuarioid'])]);
                    if(!$auth_assignment->save()){
                        throw new \yii\web\HttpException(400, json_encode($auth_assignment->errors));
                    }
                }
            }
            
            $transaction->commit();

            return true;
        }catch (\yii\web\HttpException $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            $statuCode =$exc->statusCode;
            throw new \yii\web\HttpException($statuCode, $mensaje);
        }
    }
    

    public function getAsignaciones(){

        $query = new Query();      
        $query->select('item_name as permiso');
        $query->from('auth_assignment');
        $query->leftJoin('auth_item ai', 'item_name = ai.name');
        $query->where([
            'user_id'=>$this->id,
            'type'=>AuthItem::PERMISO
        ]);
        
        $command = $query->createCommand();
        $rows = $command->queryAll();
        
        $permisos = array();
        foreach ($rows as $value) {
            $permisos[] = $value['permiso'];
        }
        $resultado['lista_permiso'] = $permisos;
        $resultado['usuarioid'] = $this->id;
        
        return $resultado;
    }

    /**
     * Borramos los permisos de un usuario
     *
     * @param [array] $params
     * @return void
     */
    public static function borrarAsignaciones($params){
        #Validamos que exista el usuario
        if(User::findOne(['id'=>$params['usuarioid']])==NULL){
            throw new \yii\web\HttpException(400, 'El usuario con el id '.$params['usuarioid'].' no existe!');
        }

        $transaction = Yii::$app->db->beginTransaction();
        try {

            SELF::limpiarPermisos($params);
            $transaction->commit();

            return true;
        }catch (\yii\web\HttpException $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            $statuCode =$exc->statusCode;
            throw new \yii\web\HttpException($statuCode, $mensaje);
        }
    }

    /**
     * Se registra un usuario con su rol, perosonaid y localidadid
     *
     * @param [array] $params
     * @return int id
     */
    static function registrarUsuario($params){
        $id = '';
        $user = new Self();
        $user->scenario = 'create';
        $lista_error = [];
        #Chequeamos si la persona tiene usuario
        if(!empty($params['personaid']) && UserPersona::findOne(['personaid'=>$params['personaid']])!=NULL){
            throw new \yii\web\HttpException(400, 'La persona ya tiene un usuario');
        }

        #Chequeamos si el parametro usuario esta seteado
        if(!isset($params['usuario']) || empty($params['usuario'])){
            throw new \yii\web\HttpException(400, 'Falta el campo usuario con sus campos');
        }
        
        #Chequeamos si la contraseña esta vacia
        if(!isset($params['usuario']['password']) || empty($params['usuario']['password'])){
            $lista_error['password'] = ['La contraseña no debe estar vacia.'];
        }
        
        #Registramos el usuario
        if ( $user->load(['User'=>$params['usuario']]) && $user->create()) {
            $id = $user->id;
        }

        #Chequeamos que venga el rol
        if(!isset($params['usuario']['rol'])){
            $user->addError('rol','Falta asiganar un rol');
        }
        
        #Chequeamos si se puede regitrar el usuario
        if($user->hasErrors() || count($lista_error)>0){
            $lista_error = ArrayHelper::merge($lista_error, $user->errors);
            throw new \yii\web\HttpException(400, json_encode(array($lista_error)));
        }
        
        #Registamos Nueva Persona
        if(!isset($params['usuario']['personaid']) || empty($params['usuario']['personaid'])){
            $params['usuario']['personaid'] = $user->registrarPersona($params);
        }

        #Vinculamos la persona
        $userPersona = new UserPersona();
        $userPersona->setAttributes($params['usuario']);
        $userPersona->userid = $id;

        if(!$userPersona->save()){
            throw new \yii\web\HttpException(400, json_encode($userPersona->errors));
        }
        
        $user->setRol($params['usuario']['rol']);

        return $id;
    }

    /**
     * Se registrar los datos personales de un usuario en sistema registral(Interoperabilidad)
     *
     * @param [array] $params
     * @return [int] $personaid
     */
    private function registrarPersona($params){
        $errors = [];
        if(!isset($params['nro_documento']) || empty($params['nro_documento'])){
            $errors['nro_documento'] = 'Se requiere nro de documento'; 
        }
        if(!isset($params['cuil']) || empty($params['cuil'])){
            $errors['cuil'] = 'Se requiere cuil'; 
        }
        if(!isset($params['apellido']) || empty($params['apellido'])){
            $errors['apellido'] = 'Se requiere apellido'; 
        }
        if(!isset($params['nombre']) || empty($params['nombre'])){
            $errors['nombre'] = 'Se requiere nombre'; 
        }

        $personaid = intval(\Yii::$app->registral->crearPersona($params));

        return $personaid;
    }

    public function modificarUsuario($params){
        $id = '';
        $this->scenario = 'update';

        #Registramos el usuario
        if ( $this->load(['User'=>$params]) && $this->save()) {
            $id = $this->id;
        }

        #Chequeamos si al modificar usuario hay errores
        if($this->hasErrors()){
            throw new \yii\web\HttpException(400, json_encode($this->errors));
        }

        #Vinculamos la persona
        $userPersona = UserPersona::findOne(['userid'=>$id]);
        $userPersona->setAttributes($params);

        if(!$userPersona->save()){
            throw new \yii\web\HttpException(400, json_encode($userPersona->errors));
        }

        if(isset($params['rol']) && (Yii::$app->user->can('admin'))){
            $this->setRol($params['rol']);
        }

        return $id;
    }

    public function setRol($rol)
    {
        #Chequeamos si el rol existe
        if(AuthItem::findOne(['name'=>$rol,'type'=>AuthItem::ROLE])==NULL){
            throw new \yii\web\HttpException(400, json_encode(['rol'=>'El rol '.$rol.' no existe']));
        }

        ######### Asignamos el Rol ###########
        //Si el usuario tiene rol borramos y dsp lo recreamos
        AuthAssignment::deleteAll(['user_id'=>$this->id, 'item_name'=>User::USUARIO]);
        AuthAssignment::deleteAll(['user_id'=>$this->id, 'item_name'=>User::SOPORTE]);
        AuthAssignment::deleteAll(['user_id'=>$this->id, 'item_name'=>User::ADMIN]);
        

        $auth_assignment = new AuthAssignment();
        $auth_assignment->setAttributes(['item_name'=>$rol,'user_id'=>strval($this->id)]);
        if(!$auth_assignment->save()){
            throw new \yii\web\HttpException(400, json_encode($auth_assignment->errors));
        }

        ######### Fin de asignacion de Rol ###########

    }

    public function setBaja($params)
    {
        $resultado = false;

        $userPersona = UserPersona::findOne(['userid'=>$this->id]);
        if($userPersona==null){
            throw new \yii\web\HttpException(400, 'No se encuentra la integridad del usuario');
        }

        if(strlen($params['descripcion_baja'])<15){
            throw new \yii\web\HttpException(400, json_encode(['error'=>['La descripcion debe tener 10 caracteres como minimo']]));
        }
        $userPersona->fecha_baja = date('Y-m-d');
        $userPersona->descripcion_baja = $params['descripcion_baja'];

        if($userPersona->save()){
            $resultado = true;
        }

        return $resultado;
    }

    public function unSetBaja($params)
    {
        $resultado = false;

        $userPersona = UserPersona::findOne(['userid'=>$this->id]);
        if($userPersona==null){
            throw new \yii\web\HttpException(400, 'No se encuentra la integridad del usuario');
        }
        
        $userPersona->fecha_baja = null;
        $userPersona->descripcion_baja = null;
        
        if($userPersona->save()){
            $resultado = true;
        }

        return $resultado;
    }


    static function buscarPersonaPorCuil($cuil){
        $resultado = \Yii::$app->registral->buscarPersonaPorCuil($cuil);
                
        if(count($resultado)>0){    
            $data['id'] = $resultado['id'];       
            $data['nro_documento'] = $resultado['nro_documento'];       
            $data['cuil'] = $resultado['cuil'];       
            $data['nombre'] = $resultado['nombre'];       
            $data['apellido'] = $resultado['apellido'];

            $usuarioPersona = UserPersona::findOne(['personaid'=>$resultado['id']]);
            if($usuarioPersona!=null){
                $data['usuario'] = User::findOne(['id'=>$usuarioPersona->userid])->toArray();
                $data['usuario']['personaid'] = $usuarioPersona->personaid;
                $data['usuario']['localidadid'] = $usuarioPersona->localidadid;
                unset($data['usuario']['password_hash']);
            }
            
        }else{
            $data = false;  
        }
        
        return $data;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPersona()
    {
        return $this->hasOne(UserPersona::className(), ['userid' => 'id']);
    }

    public function getRol(){
        $query = new Query();
        $query->select('name as rol')->from('auth_item');

        $query->leftJoin('auth_assignment','auth_assignment.item_name = auth_item.name');
        $query->leftJoin('user','user.id = auth_assignment.user_id');

        $query->where(['auth_item.type'=>AuthItem::ROLE, 'user.id'=>$this->id]);

        $command = $query->createCommand();
        $rows = $command->queryAll();
        
        $resultado = (isset($rows[0]['rol']))?$rows[0]['rol']:'';

        return $resultado;
    }

    public function fields()
    {
        $fields = ArrayHelper::merge(parent::fields(), [
            "confirmed_at" => function () {
                return date('Y-m-d',$this->confirmed_at);
            },
            "created_at" => function () {
                return date('Y-m-d',$this->created_at);
            },
            "updated_at" => function () {
                return date('Y-m-d',$this->updated_at);
            },
            "last_login_at" => function () {
                return date('Y-m-d H:i:s',$this->last_login_at);
            },
            "last_login_ip" => function () {
                return $this->userPersona->last_login_ip;
            },
            "personaid" => function () {
                return $this->userPersona->personaid;
            },
            "fecha_baja" => function () {
                return ($this->userPersona->fecha_baja)?$this->userPersona->fecha_baja:'';
            },
            "baja" => function () {
                return ($this->userPersona->fecha_baja)?true:false;
            },
            "descripcion_baja" => function () {
                return ($this->userPersona->descripcion_baja)?$this->userPersona->descripcion_baja:'';
            },
            "localidadid" => function () {
                return $this->userPersona->localidadid;
            },
            "rol"

        ]);
        
        unset($fields['password_hash'],$fields['auth_key']);

        return $fields;
    }
    
}
