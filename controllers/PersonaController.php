<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;

use \app\models\PersonaForm;

class PersonaController extends ActiveController{
    
    public $modelClass = 'app\models\Persona';
    
    public function behaviors()
    {

        $behaviors = parent::behaviors();     

        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className()
        ];

        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;

        $behaviors['authenticator'] = $auth;

        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\HttpBearerAuth::className(),
        ];

        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];     

        $behaviors['access'] = [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['*'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['usuario'],
                ],
            ]
        ];



        return $behaviors;
    }
    
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['index']);
        unset($actions['view']);
        return $actions;
    
    }
    
    /**
     * Esta accion permite hacer una interoperabilidad con el sistema registral
     * @return array()
     */
    public function actionIndex()
    {
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('persona_ver')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }

        $resultado['estado']=false;
        $param = Yii::$app->request->queryParams;
        
        $resultado = PersonaForm::buscarPersonaEnRegistralConPaginacion($param);
        
        return $resultado;

    }
    
    public function actionView($id)
    {
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('persona_ver')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }

        $resultado = \Yii::$app->registral->viewPersona($id);
        if(!empty($resultado)){
            $data = $resultado;       
        }else{
            $data = $resultado;  
        }
        
        return $data;

    }
    
    /**
     * Se reciben los parametros para crear un persona y realizar la interoperabilidad con registral
     * @return array
     * @throws \yii\web\HttpException
     */
    public function actionCreate()
    {
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('persona_crear')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }

        $resultado['message']='Se registró una nueva persona';
        $param = Yii::$app->request->post();
        
        try {
            $model = new PersonaForm();
            $model->setAttributesAndSave($param);
            
            $resultado['success']=true;
            $resultado['data']['id']=$model->id;
            
            return $resultado;
           
        }catch (Exception $exc) {
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }

    }
    
    /**
     * Este update es necesario que por parametros vengas los datos obligatorios de persona y/o de lugar
     * @param int $id
     * @return array
     * @throws \yii\web\HttpException
     * @throws Exception
     */
    public function actionUpdate($id)
    {
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('persona_modificar')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }

        $resultado['message']='Se modifica una Persona';
        $param = Yii::$app->request->post();
        try {   
            
            if(is_int($id)){
                throw new Exception("El id es invalido.");
            }
                        
            $param['id'] = $id;            
            $model = new PersonaForm();
            $model->setAttributesAndSave($param);
            
            $resultado['success']=true;
            $resultado['data']['id']=$model->id;
            
            return $resultado;
           
        }catch (Exception $exc) {
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }

    }
    
    /**
     * Solo se editan los datos de contacto: email, telefono, celular, lista_red_social
     * @param int $id
     * @return array 
     * @throws \yii\web\HttpException
     * @throws Exception
     */
    public function actionContacto($id)
    {
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('persona_crear')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }
        $resultado['message']='Se modifica los datos de contacto de una Persona';
        $param = Yii::$app->request->post();
        try {   
            
            if(is_int($id)){
                throw new Exception("El id es invalido.");
            }
            
            #es necesario concatenar el id
            $param['id'] = $id;
            
            $model = new PersonaForm();
            $model->setContactoAndSave($param);
            
            $resultado['success']=true;
            $resultado['data']['id']=$model->id;
            
            return $resultado;
           
        }catch (Exception $exc) {
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }

    }
    
    /**
     * Se busca una persona por numero documento
     * @param type $nro_documento
     * @Method GET
     * @url ejemplo http://api.gcb.local/personas/buscar-por-documento/29800100
     * @return array
     */
    public function actionBuscarPorDocumento($nro_documento)
    {
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('persona_ver')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }
        $resultado['estado']=false;   
        $resultado = \Yii::$app->registral->buscarPersonaPorNroDocumento($nro_documento);
        
        if(isset($resultado['resultado']) && count($resultado['resultado'])>0){
            $data['success']=true;
            $data['resultado']=$resultado['resultado'];
        }else{
            $data['success']=false;  
            $data['message']="No se encontró ninguna persona!";
        }

        return $data;

    }
    
}