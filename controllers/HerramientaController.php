<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;


class HerramientaController extends ActiveController{
    
    public $modelClass = 'Herramienta';
    
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
            'only' => ['index'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['admin'],
                ],
            ]
        ];



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
    
    public function actionImportar()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $model = new \app\models\Herramienta();
            $model->file = \yii\web\UploadedFile::getInstanceByName('cuentas');
            $resultado = $model->importarCuentas();
            
            $transaction->commit();
            
            return $resultado;
           
        }catch (Exception $exc) {
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }
        
        
        exit();

    }
    
    public function actionImportarSubsucursalesACuenta()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $model = new \app\models\Herramienta();
            $model->file = \yii\web\UploadedFile::getInstanceByName('cuentas');
            $resultado = $model->importarSubSucursalesACuentas();
            
            $transaction->commit();
            
            return $resultado;
           
        }catch (Exception $exc) {
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }
        
        
        exit();

    }
    
    
    
}