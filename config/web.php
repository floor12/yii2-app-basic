<?php

use floor12\backup\models\BackupType;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => [
        'backup' => [
            'class' => 'floor12\backup\Module',
            'backupFolder' => '@common/../backups',
            'editRole' => '@',
            'configs' => [
                [
                    'id' => 'main_db',
                    'type' => BackupType::DB,
                    'title' => 'Основная база',
                    'connection' => 'db'
                ]
            ]
        ],
        'banner' => [
            'class' => 'floor12\banner\Module',
            'editRole' => '@',
            'layout' => '@frontend/views/layouts/main'
        ],
        'pages' => [
            'class' => 'floor12\pages\Module',
            'editRole' => '@',
            'layout' => '@app/views/layouts/columns',
            'userModel' => \app\models\User::class
        ],
        'news' => [
            'class' => 'floor12\news\Module',
            'editRole' => '@',
            'userModel' => \app\models\User::class
        ],
        'files' => [
            'class' => 'floor12\files\Module',
        ],
    ],
    'components' => [
        'metamaster' => [
            'class' => 'floor12\metamaster\MetaMaster',
            'siteName' => "Floor12 basic application",
            'defaultImage' => '/design/export_logo.jpg',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'faefasfewfsd',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
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
            'rules' => [
                '/<path:[\w_\/-]+>.html' => '/pages/page/view',
                '/sitemap.xml' => '/site/sitemap',
            ],
        ],
    ],
    'params' => $params,
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
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
