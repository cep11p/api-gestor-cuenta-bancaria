<?php
namespace app\modules\api\controllers;

use app\models\AuthItem;
use app\models\AuthItemSearch;
use yii\rest\ActiveController;
use yii\web\Response;

use Yii;

class PermisoController extends ActiveController{
    
    public $modelClass = 'app\models\AuthItem';
    
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
                    'actions' => ['index'],
                    'roles' => ['soporte'],
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
     * Se listan todos los permisos
     * @return array()
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->queryParams;
        $params['type'] = AuthItem::PERMISO;
        $searchModel = new AuthItemSearch();

        $resultado = $searchModel->search($params);
        
        return $resultado;

    }
    
    
    
}