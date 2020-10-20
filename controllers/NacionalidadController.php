<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;


class NacionalidadController extends ActiveController{
    
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
//            'only' => ['index'],
//            'rules' => [
//                [
//                    'allow' => true,
//                    'actions' => ['index'],
//                    'roles' => ['consultar_persona'],
//                ],
//            ]
//        ];



        return $behaviors;
    }
    
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['create']);
        unset($actions['view']);
        unset($actions['update']);
        return $actions;
    
    }
    
    /**
     * Esta accion permite hacer una interoperabilidad con el sistema registral
     * @return array()
     */
    public function actionIndex()
    {
        $param = \Yii::$app->request->queryParams;
        
        $resultado = \Yii::$app->registral->buscarNacionalidad($param);
        
        return $resultado;

    }
    
    
    
}