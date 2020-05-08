<?php
// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',
    'aliases' => [
        'application.migrations' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '../database/migrations',
    ],
    'components' => [
        'db' => [
            #'class' => 'yii\db\Connection',
            'connectionString' => 'mysql:host=mariadb;dbname=logger',
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8',
        ],
    ],
    'params' => [
        'parser' => [
            'template' => '/(([0-9]{1,3}[\.]){3}[0-9]{1,3}).*?\[(.*?)\s+.*?\].*?"(\S+).*?((\d){3})/m',
            'logs_folder' => '/var/www/html/docker/httpd/logs/access_log',
        ]
    ],
    'import' => [
        'application.models.*',
    ]
);