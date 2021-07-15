<?php
namespace app\modules\api\controllers;

use app\models\Export;
use app\models\ExportSearch;
use yii\rest\ActiveController;
use yii\web\Response;

use Yii;

class ExportController extends ActiveController{
    
    public $modelClass = 'app\models\Export';
    
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
        $params = Yii::$app->request->queryParams;
        $searchModel = new ExportSearch();

        $resultado = $searchModel->search($params);
        
        return $resultado;
    }
    
    public function actionView($id)
    {
        $resultado['message']='Se exporta';
        $model = Export::findOne(['id'=>$id]);            
        if($model==NULL){
            throw new \yii\web\HttpException(400, 'El recurso con el id '.$id.' no existe!');
        }
        
        $resultado = $model->exportar();
        
        return $resultado;
    }
    
    
}