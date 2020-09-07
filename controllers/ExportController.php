<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;



class ExportController extends ActiveController{
    
    public $modelClass = 'app\models\export';
    
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
    
//    public function actionExportarPrestacionesXls()
//    {
//        $resultado['message']='Se exportan todas la prestaciones';
//        $params = \Yii::$app->request->queryParams;
//        
//        $transaction = Yii::$app->db->beginTransaction();        
//        try{
//        }catch (Exception $exc) {
//            $transaction->rollBack();
//            $mensaje =$exc->getMessage();
//            throw new \yii\web\HttpException(400, $mensaje);
//        }
//
//    }
    
    public function actionCtaSaldo()
    {
        $params = \Yii::$app->request->post();
        
        $resultado['message']='Se exportan todas la prestaciones';
        $transaction = Yii::$app->db->beginTransaction();
        
        try{
            
            
            $ctaSaldo = \app\models\Cuenta::crearCtaSaldo($params);
            header('Content-Type: txt');
            header('Content-Disposition: attachment;filename="CTASLDO.txt"');
            header('Cache-Control: max-age=0');
//                            
//            print_r('hola');
            exit();
        }catch (Exception $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }

    }
    
}