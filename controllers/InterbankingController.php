<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;



class InterbankingController extends ActiveController{
    
    public $modelClass = 'app\models\Interbanking';
    
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
        unset($actions['view']);
        unset($actions['index']);
        return $actions;
    
    }
    
    public function actionExportar()
    {
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('interbanking_exportar')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        } 

        $params = \Yii::$app->request->post();
        
        $resultado['message']='Se exportan el archivo interbanking';
        $transaction = Yii::$app->db->beginTransaction();
        
        try{            
            
            $interbanking = \app\models\Interbanking::exportar($params);

            if(!empty($interbanking)){
                $resultado['interbanking'] = $interbanking;
                $transaction->commit();
            }else{
                throw new \yii\web\HttpException(400, 'No hay prestaciones para exportar a tesoreria');
            }
            
            return $resultado;
        }catch (Exception $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }

    }
    
}