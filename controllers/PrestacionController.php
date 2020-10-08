<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;
use yii\base\Exception;

class PrestacionController extends ActiveController{
    
    public $modelClass = 'app\models\Prestacion';
    
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
        return $actions;
    
    }
    
    public function actionCreate() {
        $params = \Yii::$app->request->post();
        $resultado['message']='Se crea una prestacion';
        $transaction = \Yii::$app->db->beginTransaction();
        
        try{            
            $model = new \app\models\Prestacion();
            $model->setAttributesCustom($params);
            
            if(!$model->save()){
                throw new Exception(json_encode($model->getErrors()));
            }
            
            $transaction->commit();
            
            $resultado['id']=$model->id;
            
            return  $resultado;
            
        }catch (Exception $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }
    }
    
    
    
}