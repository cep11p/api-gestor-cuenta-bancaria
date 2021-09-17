<?php
namespace app\modules\api\controllers;

use app\models\Cuenta;
use app\models\Prestacion;
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
        unset($actions['delete']);
        return $actions;
    
    }
    
    public function actionCreate() {
        $params = \Yii::$app->request->post();
        $resultado['message']='Se crea una prestacion';
        $transaction = \Yii::$app->db->beginTransaction();
        
        try{            
            $model = new \app\models\Prestacion();
            $model->setAttributesCustom($params);
            // $model->validarConvenioRule();
            
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

        #Chequeamos el permiso
        if (!\Yii::$app->user->can('prestacion_borrar')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }

        $resultado = 'Se borra la solicitud de CBU';
        $model = Prestacion::findOne(['personaid'=>$id]);
        if($model == Null){
            throw new \yii\web\HttpException(400, 'No existe la entidad con  personaid '.$id);
        }

        // $model->validarConvenioRule();

        $cuenta = Cuenta::findOne(['personaid' => $id]);

        if($cuenta != null){
            throw new \yii\web\HttpException(400, 'Solo se pueden borrar Solicitudes de CBU en estado pendiente');
        }

        $model->delete();

        return $resultado;
    }

    public function actionDelete($id){
        $model = Prestacion::findOne(['id'=>$id]);
        if($model == Null){
            throw new \yii\web\HttpException(400, 'No existe la entidad con  personaid '.$id);
        }

        // $model->validarConvenioRule();
        $model->delete();
    }
    
}