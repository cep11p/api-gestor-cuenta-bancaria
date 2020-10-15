<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;

use \app\models\PersonaForm;

class PersonaController extends ActiveController{
    
    public $modelClass = 'app\models\Programa';
    
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

//        $behaviors['authenticator'] = [
//            'class' => \yii\filters\auth\HttpBearerAuth::className(),
//        ];

        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];     

//        $behaviors['access'] = [
//            'class' => \yii\filters\AccessControl::className(),
//            'only' => ['*'],
//            'rules' => []
//        ];



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
        $resultado['estado']=false;
        $param = Yii::$app->request->queryParams;
        
        
        $resultado = \Yii::$app->registral->buscarPersona($param);
        
        if($resultado['estado']!=true){
            $resultado['success']=false;
            $resultado['total_filtrado']=0;            
            $resultado['resultado']=[];
            $resultado['message']="No se encontró ninguna persona!";   
        }else{
            $resultado['success']=true;
//            $resultado['resultado']=\app\models\Cuenta::vincularCuenta($resultado['resultado']);
        }
        
        return $resultado;

    }
    
    public function actionView($id)
    {
        $resultado = \Yii::$app->registral->viewPersona($id);
                
        if($resultado['estado']!=true){
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
     * @url ejemplo http://api.pril.local/api/personas/buscar-por-documento/29800100
     * @return array
     */
    public function actionBuscarPorDocumento($nro_documento)
    {
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