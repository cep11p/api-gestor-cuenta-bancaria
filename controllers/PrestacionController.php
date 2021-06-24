<?php
namespace app\controllers;

use app\models\Prestacion;
use phpDocumentor\Reflection\Types\Null_;
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
    
    public function actionBorrarPendiente($id){
        $resultado = 'Se borra la solicitud de CBU';
        $model = Prestacion::findOne(['personaid'=>$id]);
        if($model == Null){
            throw new \yii\web\HttpException(400, 'No existe la entidad con  personaid '.$id);
        }

        if($model->estado != Prestacion::SIN_CBU){
            throw new \yii\web\HttpException(400, 'Solo se pueden borrar Solicitudes de CBU en estado pendiente');
        }

        $model->delete();

        return $resultado;
    }
    
}