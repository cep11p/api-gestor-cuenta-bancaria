<?php
namespace app\modules\api\controllers;

use app\components\Help;
use app\models\Cuenta;
use Exception;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class CuentaController extends ActiveController{
    
    public $modelClass = 'app\models\Cuenta';
    const CAJA_AHORRO = 2;
    
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
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        unset($actions['create']);
        unset($actions['view']);
        unset($actions['update']);
        unset($actions['delete']);

        return $actions;
    }
    
    public function prepareDataProvider() 
    {
        $searchModel = new \app\models\CuentaSearch();
        $params = \Yii::$app->request->queryParams;
        $resultado = $searchModel->search($params);
        
        if(!empty($resultado['resultado'])){
            $resultado['resultado'] = \app\models\Cuenta::vincularPropietario($resultado['resultado']);
            // $resultado['resultado'] = \app\models\Cuenta::setOrigenConvenio($resultado['resultado']);
        }

        return $resultado;
    }

    public function actionCreate(){
        $params = \Yii::$app->request->post();
        $resultado['message']='Se registra un cuenta bancaria';
        $transaction = Yii::$app->db->beginTransaction();
        
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('cuenta_crear')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }
        
        try{            
            
            $cuenta = new Cuenta();
            $cuenta->setAttributes($params);
            $cuenta->scenario = Cuenta::SCENARIO_CUENTA_PARTICULAR;
            $cuenta->tipo_cuentaid = $this::CAJA_AHORRO;

            
            if(!$cuenta->save()){                
                throw new Exception(Help::ArrayErrorsToString($cuenta->errors));
            }
            
            $transaction->commit();
            return $resultado;
        }catch (\yii\web\HttpException $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            $statuCode =$exc->statusCode;
            throw new \yii\web\HttpException($statuCode, $mensaje);
        }
    }

    public function actionDelete($id){

        #Chequeamos el permiso
        if (!\Yii::$app->user->can('cuenta_borrar')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }
        
        $resultado['message']='Se borra una cuenta';
        $model = Cuenta::findOne(['id'=>$id]);            
        if($model==NULL){
            throw new \yii\web\HttpException(400, 'La cuenta con el id '.$id.' no existe!');
        }

        if(!$model->borrarCuenta()){
            $resultado['message']='No se pudo borra la cuenta '.$this->cbu;
        }

        return $resultado;
    }

    public function actionUpdate($id){
        
        #Chequeamos el permiso
        if (!\Yii::$app->user->can('cuenta_modificar')) {
            throw new \yii\web\HttpException(403, 'No se tienen permisos necesarios para ejecutar esta acción');
        }

        $resultado['message']='Se modifica la cuenta';
        $params = \Yii::$app->request->post();

        #Buscamos la cuenta
        $model = Cuenta::findOne(['id'=>$id]);            
        if($model==NULL){
            throw new \yii\web\HttpException(400, 'La cuenta con el id '.$id.' no existe!');
        }

        #Chequeamos el origen de la cuenta
        if($model->origenConvenio()){
            throw new \yii\web\HttpException(400, 'No se puede modificar una cuenta que fue dado de alta por el convenio 8081');
        }

        
        $transaction = Yii::$app->db->beginTransaction();
        try{            
            
            $model->setAttributes($params);
            $model->scenario = Cuenta::SCENARIO_CUENTA_PARTICULAR;
            $model->tipo_cuentaid = $this::CAJA_AHORRO;
            $model->tesoreria_alta = 0;

            if(!$model->save()){                
                throw new Exception(Help::ArrayErrorsToString($model->errors));
            }
            
            $transaction->commit();

            return $resultado;
        }catch (\yii\web\HttpException $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            $statuCode =$exc->statusCode;
            throw new \yii\web\HttpException($statuCode, $mensaje);
        }

    }
    
}