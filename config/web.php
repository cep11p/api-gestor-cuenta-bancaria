<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
Yii::$classMap['dektrium\rbac\models\Rule'] = '@app/overrides/Rule.php';
$config = [
    'id' => 'basic',
    'name' => 'Gestor de cuentas bancarias',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language'=>'es',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '2MhN5oRwO3iz0AAq-FGXCQe-y_YsaMl6',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
//                'multipart/form-data' => 'yii\web\MultipartFormDataParser'
            ]
        ],
        
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'es_ES',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
            
        ],
        
        /************** Componente interoperable *************/
        'registral'=> [
            'class' => $params['servicioRegistral'],//'app\components\ServicioLugar'
        ],
        'lugar'=> [
            'class' => $params['servicioLugar'],
        ],
        /************* Fin Componente interoperable *************/
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'user' => [
        //     'identityClass' => 'app\models\User',
        //     'enableSession' => false,
        // ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/tipo-convenio', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/tipo-export', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/provincia', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/departamento', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/tipo-cuenta', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/banco', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/prestacion', 
                    'extraPatterns' => [
                        'DELETE borrar-pendiente/{id}' => 'borrar-pendiente',
                        'OPTIONS borrar-pendiente/{id}' => 'borrar-pendiente',
                        'POST exportar-convenio' => 'exportar-convenio',
                        'OPTIONS exportar-convenio' => 'exportar-convenio',
                    ],
                    'tokens' => [ '{id}' => '<id:\\w+>'],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/provincia', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/departamento', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/tipo-cuenta', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/api/banco', 
                    'extraPatterns' => [
                        'GET banco' => 'pepe',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/prestacion', 
                    'extraPatterns' => [
                        'DELETE borrar-pendiente/{id}' => 'borrar-pendiente',
                        'OPTIONS borrar-pendiente/{id}' => 'borrar-pendiente',
                    ],
                    'tokens' => [ '{id}' => '<id:\\w+>'],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/sucursal', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/sub-sucursal', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/cuenta', 
                ], 
                [   #Export
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/export', 
                ], 
                [   #CTASLDO
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/cuenta-saldo', 
                    'extraPatterns' => [
                        'POST Exportar' => 'exportar',
                        'OPTIONS Exportar' => 'exportar',
                    ], 
                ],
                [   #INTERBANKING
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/interbanking', 
                    'extraPatterns' => [
                        'POST Exportar' => 'exportar',
                        'OPTIONS Exportar' => 'exportar',
                    ], 
                ],
                [   #CuentaBps
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/cuenta-bps', 
                    'extraPatterns' => [
                        'POST Importar' => 'importar',
                        'OPTIONS Importar' => 'importar',
                    ], 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/herramienta', 
                    'extraPatterns' => [
                        'POST Importar' => 'importar',
                        'OPTIONS Importar' => 'importar',
                        'POST importar-subsucursales-a-cuenta' => 'importar-subsucursales-a-cuenta',
                        'OPTIONS importar-subsucursales-a-cuenta' => 'importar-subsucursales-a-cuenta',

                    ], 
                ],
                 ##### Interoperabilidad con Registral #####
                [   #persona
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/persona', 
                    'extraPatterns' => [
                        'GET buscar-por-documento/{nro_documento}' => 'buscar-por-documento',
                        'OPTIONS buscar-por-documento/{nro_documento}' => 'buscar-por-documento',
                        'PUT contacto/{id}' => 'contacto',
                        'OPTIONS contacto/{id}' => 'contacto',
                    ],
                    'tokens' => [ '{id}' => '<id:\\w+>', '{nro_documento}'=>'<nro_documento:\\w+>' ],
                ],
                
                [   #tipo-documento
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/tipo-documento', 
                ],
                [   #localidad
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/localidad', 
                ],
                [   #backend-localidad
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/backend-localidad', 
                ],
                [   #backend-localidad
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/localidad-extra', 
                ],
                [   #nacionalidad
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/nacionalidad', 
                ],
                [   #sexo
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/sexo', 
                ],
                [   #tipo-red-social
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/tipo-red-social', 
                ],
                [   #genero
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/genero', 
                ],
                [   #estado-civil
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/estado-civil', 
                ],

                [   #Permiso
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/permiso', 
                ],
                [   #Rol
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/rol', 
                ],
                /*************** Fin de Ruteo Registral *****************/
                /****** USUARIOS *******/
                [   #Usuario
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/usuario',   
                    'extraPatterns' => [
                        'POST login' => 'login',
                        'OPTIONS login' => 'options',
                        'OPTIONS listar-asignacion/{id}' => 'listar-asignacion',
                        'GET listar-asignacion/{id}' => 'listar-asignacion',
                        'OPTIONS crear-asignacion' => 'crear-asignacion',
                        'POST crear-asignacion' => 'crear-asignacion',
                        'OPTIONS borrar-asignacion' => 'borrar-asignacion',
                        'POST borrar-asignacion' => 'borrar-asignacion',
                        'OPTIONS baja/{id}' => 'baja',
                        'PUT baja/{id}' => 'baja',
                        'OPTIONS buscar-persona-por-cuil/{cuil}' => 'buscar-persona-por-cuil',
                        'GET buscar-persona-por-cuil/{cuil}' => 'buscar-persona-por-cuil',
                    ],
                    'tokens' => ['{id}'=>'<id:\\w+>', '{cuil}'=>'<cuil:\\w+>'],                       
                ],  
            ],
        ],
        
    ],
    'params' => $params,
    
    'modules'=>[
        'api' => [
            'class' => 'app\modules\api\Api',
        ],
        "audit"=>[
            "class"=>"bedezign\yii2\audit\Audit",
            "ignoreActions" =>['audit/*', 'debug/*'],
            'userIdentifierCallback' => ['app\components\ServicioUsuarios', 'userIdentifierCallback'],
            'userFilterCallback' => ['app\components\ServicioUsuarios', 'userFilterCallback'],
            'accessIps'=>null,
            'accessUsers'=>null,
            'accessRoles'=>['admin']
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableConfirmation'=> false,
            'enableRegistration'=> false,
            'enablePasswordRecovery'=> false,
            'admins'=>['admin']
        ],
        'registral' => [
            'class' => 'app\modules\registral\Registral',
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
