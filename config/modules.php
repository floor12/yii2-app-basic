<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 27.09.2018
 * Time: 9:50
 */

use floor12\backup\models\BackupType;
use floor12\user\models\User;


return [
    'backup' => [
        'class' => 'floor12\backup\Module',
        'backupFolder' => '@app/backups',
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
    ],
    'user' => [
        'class' => 'floor12\user\Module',
        'editRole' => '@',
    ],
    'pages' => [
        'class' => 'floor12\pages\Module',
        'editRole' => '@',
        'userModel' => User::class
    ],
    'news' => [
        'class' => 'floor12\news\Module',
        'editRole' => '@',
        'userModel' => User::class,
    ],
    'files' => [
        'class' => 'floor12\files\Module',
        'storage' => '@app/storage'
    ],
];

