<?php
namespace app\controllers;

use app\models\BackendLocalidad;
use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

class BackendLocalidadController extends ActiveController{
    
    public $modelClass = 'app\models\localidad';
    
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
                    'roles' => ['@'],
                ],
            ]
        ];



        return $behaviors;
    }
    
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['view']);
        unset($actions['create']);
        unset($actions['update']);
        return $actions;
    
    }
    
    /**
     * Esta accion permite hacer una interoperabilidad con el sistema registral
     * @return array()
     */
    public function actionIndex()
    {
        $param = Yii::$app->request->queryParams;
        
        $lista_localidad = \Yii::$app->lugar->buscarLocalidad($param);
        $lista_localidad['resultado'] = BackendLocalidad::setFlagLocalidadExtra($lista_localidad['resultado']);
        
        return $lista_localidad;

    }

    public function actionExtra()
    {
        $resultado['estado']=false;
        $param = Yii::$app->request->queryParams;
        
        $resultado = \Yii::$app->lugar->buscarLocalidadExtra($param);

        
        return $resultado;

    }
    
    public function actionCreate(){
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('localidad_crear')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }

        $resultado['message']='Se registra una nueva localidad';
        $param = Yii::$app->request->post();

        $response = \Yii::$app->lugar->crearLocalidad($param);

        if(isset($response['message'])){
            throw new \yii\web\HttpException(400, $response['message']);
        }

        $resultado['success']=true;
        $resultado['data']['id']=$response;

        return $resultado;
        
    }

    public function actionUpdate($id){
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('localidad_modificar')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }

        $resultado['message']='Se modifica una nueva localidad';
        $param = Yii::$app->request->post();
        $param['id'] = $id;

        $response = \Yii::$app->lugar->modificarLocalidad($param);

        if(isset($response['message'])){
            throw new \yii\web\HttpException(400, $response['message']);
        }

        $resultado['success']=true;
        $resultado['data']['id']=$response;

        return $resultado;
        
    }
    
}