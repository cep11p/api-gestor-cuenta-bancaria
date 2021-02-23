<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'JWT_SECRET' => 'ZqCeBt}246',
    'REGISTRAL_JWT_SECRET' => 'ZqCeBt}531',
    'servicioRegistral'=> getenv('SERVICIO_REGISTRAL')?getenv('SERVICIO_REGISTRAL'):'app\components\DummyServicioRegistral',
    'servicioLugar'=> getenv('SERVICIO_LUGAR')?getenv('SERVICIO_LUGAR'):'app\components\DummyServicioLugar',
    'UID_REGISTRAL'=>'3',
    'USUARIO_REGISTRAL'=>'gcb',
];
