<?php

namespace app\controllers;

use app\components\VinculoInteroperableHelp;
use app\models\User;
use yii\rest\ActiveController;
use Yii;
use yii\web\Response;
use dektrium\user\Finder;
use dektrium\user\helpers\Password;
use dektrium\user\Module;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

class UsuarioController extends ActiveController
{
    public $modelClass = 'app\models\ApiUser';
    
    /** @var Finder */
    protected $finder;

    /**
     * @param string $id
     * @param Module $module
     * @param Finder $finder
     * @param array  $config
     */
    public function __construct($id, $module, Finder $finder, $config = [])
    {
        $this->finder = $finder;
        parent::__construct($id, $module, $config);
    }
    
    
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
        $behaviors['authenticator']['except'] = [
            'options',
            'login',
        ];     

        $behaviors['access'] = [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['*'],
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['login'],
                    'roles' => ['?'],
                ],
                [
                    'allow' => true,
                    'actions' => ['index','create','view','buscar-persona-por-cuil'],
                    'roles' => ['@'],
                ]
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
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider() 
    {
        $searchModel = new \app\models\UserSearch();
        $params = \Yii::$app->request->queryParams;
        $resultado = $searchModel->search($params);

        $resultado['resultado'] = VinculoInteroperableHelp::vincularDatosLocalidad($resultado['resultado']);
        $resultado['resultado'] = VinculoInteroperableHelp::vincularDatosPersona($resultado['resultado'],['nombre','apellido','nro_documento','cuil']);

        return $resultado;
    }
    
        /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $parametros = Yii::$app->getRequest()->getBodyParams();
        
        $usuario = $this->finder->findUserByUsernameOrEmail($parametros['username']);       
        
        if(!($usuario !== null && Password::validate($parametros['password_hash'],$usuario->password_hash))){
            throw new \yii\web\HttpException(500, 'usuario o contraseña inválido');
        }
        
        $payload = [
            'exp'=>time()+3600,
            'usuario'=>$usuario->username,
            'uid' => $usuario->id  
        ];
        
        $token = \Firebase\JWT\JWT::encode($payload, \Yii::$app->params['JWT_SECRET']);   
            
        return [
            'access_token' => $token,
            'username' => $usuario->username
        ];
        
    }
    
    /**
     * Se registra un usuario con rol, personaid y localidadid
     *
     * @return void
     */
    public function actionCreate(){
        $resultado['message']='Se crea un usuario';
        $params = Yii::$app->request->post();

        $transaction = Yii::$app->db->beginTransaction();
        try {
       
            $resultado['data']['id'] = User::registrarUsuario($params);

            $transaction->commit();
            return $resultado;
        }catch (\yii\web\HttpException $exc) {
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            $statuCode =$exc->statusCode;
            throw new \yii\web\HttpException($statuCode, $mensaje);
        }
    }

    public function actionView($id){
        $model = User::findOne(['id'=>$id]);            
        if($model==NULL){
            throw new \yii\web\HttpException(400, 'El usuario con el id '.$id.' no existe!');
        }
        
        $resultado = ArrayHelper::merge($model->toArray(),$model->userPersona->persona);
        $resultado['localidad'] = $model->userPersona->localidad;
        
        return $resultado;
    }

    /**
     * Esta funcionalidad realiza la busqueda de una persona, si la persona tiene un usuario le vinculamos el usuario, 
     * sino tiene un usuario solo se devolvera la persona, en todo caso si no se encuenta ninguna 
     * de las dos cosas se devuelve success=false
     *
     * @param [int] $cuil
     * @return array
     */
    public function actionBuscarPersonaPorCuil($cuil){

        $data = User::buscarPersonaPorCuil($cuil);
        if($data!=false){
            $resultado['success'] = true;
            $resultado['resultado'] = $data;
        }else{
            $resultado['success'] = false;
        }        

        return $resultado;
    }

}
