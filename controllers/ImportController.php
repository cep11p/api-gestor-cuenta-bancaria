<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;



class ImportController extends ActiveController{
    
    public $modelClass = 'app\models\import';
    
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
//            'only' => ['exportar-prestaciones-xls'],
//            'rules' => [
//                [
//                    'allow' => true,
//                    'actions' => ['exportar-prestaciones-xls'],
//                    'roles' => ['exportar_prestacion'],
//                ],
//            ]
//        ];



        return $behaviors;
    }
    
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['view']);
        unset($actions['index']);
        return $actions;
    
    }
    
    public function actionCtaBps()
    {
//        $file = Yii::$app->request->getBodyParams();        
//        print_r($_FILES);die();
        
        $model = new \app\models\CtaBps();
        $model->file = \yii\web\UploadedFile::getInstanceByName('ctabps');
        $model->importar();
        
        exit();

    }
    
}