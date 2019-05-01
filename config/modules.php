<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 27.09.2018
 * Time: 9:50
 */

use common\src\enum\RoleEnum;
use floor12\backup\models\BackupType;
use floor12\user\models\User;


return [
    'feedback' => [
        'class' => 'floor12\feedback\Module',
        'adminRoles' => ['@'],
    ],
    'backup' => [
        'class' => 'floor12\backup\Module',
        'backupFolder' => '@app/backups',
        'editRole' => '@',
        'configs' => [
            [
                'id' => 'main_db',
                'type' => BackupType::DB,
                'title' => 'Основная база',
                'connection' => 'db',
                'limit' => 3
            ],
            [
                'id' => 'main_storage',
                'type' => BackupType::FILES,
                'title' => 'Папка storage',
                'path' => '@app/storage',
                'limit' => 3
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

