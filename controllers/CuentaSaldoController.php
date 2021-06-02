<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;

use Yii;
use yii\base\Exception;



class CuentaSaldoController extends ActiveController{
    
    public $modelClass = 'app\models\CuentaSaldo';
    
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
        $params = \Yii::$app->request->post();
        
        $resultado['message']='Se crea el archivo CTASLDO.txt';
        $transaction = Yii::$app->db->beginTransaction();

        #Chequeamos el permiso
        if (!\Yii::$app->user->can('cuenta_saldo_exportar')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }
        
        try{            
            
            $ctaSaldo = \app\models\CuentaSaldo::exportCtaSaldo($params);
        
            if(!empty($ctaSaldo)){
                $resultado['cuenta_saldo'] = $ctaSaldo;
                $transaction->commit();
                return $resultado;
            }else{
                throw new \yii\web\HttpException(400, 'Lista de personas vacia');
            }
        }catch (Exception $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }
        
    }
    
     public function actionCreate() {
        $params = \Yii::$app->request->post();
        $resultado['message']='Se guarda el documento ctasaldo';
        $transaction = Yii::$app->db->beginTransaction();
        
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('cuenta_saldo_crear')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }

        try{            
            
            $resultado = \app\models\CuentaSaldo::guardarCtaSaldo($params);
            $transaction->commit();
            
            return $resultado;
        }catch (Exception $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            throw new \yii\web\HttpException(400, $mensaje);
        }

    }
    
    public function actionIndex()
    {
        $resultado = \app\models\CuentaSaldo::verCtaSaldo();

        
        return $resultado;

    }
    
}