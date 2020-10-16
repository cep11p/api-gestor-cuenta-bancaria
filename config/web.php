<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
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
        'user' => [
            'identityClass' => 'app\models\ApiUser',
            'enableSession' => false,
        ],
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
                    'controller' => 'tipo-cuenta', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'prestacion', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'sucursal', 
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'sub-sucursal', 
                ],
                [   #Export
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/export', 
                    'extraPatterns' => [
                        'POST CtaSaldo' => 'cta-saldo',
                        'OPTIONS CtaSaldo' => 'cta-saldo',
                        'GET VerCtaSaldo' => 'ver-cta-saldo',
                        'OPTIONS VerCtaSaldo' => 'ver-cta-saldo',
                    ], 
                ],
                [   #Import
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/import', 
                    'extraPatterns' => [
                        'POST CtaSaldo' => 'cta-bps',
                        'OPTIONS CtaSaldo' => 'cta-bps',
                    ], 
                ],
                 ##### Interoperabilidad con Registral #####
                [   #persona
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'persona', 
                    'extraPatterns' => [
                        'GET buscar-por-documento/{nro_documento}' => 'buscar-por-documento',
                        'OPTIONS buscar-por-documento/{nro_documento}' => 'buscar-por-documento',
                        'PUT contacto/{id}' => 'contacto',
                        'OPTIONS contacto/{id}' => 'contacto',
                    ],
                    'tokens' => [ '{id}' => '<id:\\w+>', '{nro_documento}'=>'<nro_documento:\\w+>' ],
                ],
                /****** USUARIOS *******/
                [   
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'usuario',   
                    'extraPatterns' => [
                        'POST login' => 'login',
                        'OPTIONS login' => 'options'
                        //'GET mostrar/{id}' => 'mostrar',
                    ],          
                ],
            ],
        ],
        
    ],
    'params' => $params,
    
    'modules'=>[
        "audit"=>[
            "class"=>"bedezign\yii2\audit\Audit",
            "ignoreActions" =>['audit/*', 'debug/*'],
            'userIdentifierCallback' => ['app\components\ServicioUsuarios', 'userIdentifierCallback'],
            'userFilterCallback' => ['app\components\ServicioUsuarios', 'userFilterCallback'],
            'accessIps'=>null,
            'accessUsers'=>null,
            'accessRoles'=>null
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableConfirmation'=>false,
            'admins'=>['admin']
        ],
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
