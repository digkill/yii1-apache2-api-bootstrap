<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Logger',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.controllers.api.*'
	),

	'defaultController'=>'log/index',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		/*'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),*/
		// uncomment the following to use a MySQL database
/*
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=logger;port=3306',
			'emulatePrepare' => true,
			'username' => 'logger',
			'password' => 'password',
			'charset' => 'utf8',
			'tablePrefix' => '',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'queryCachingDuration' => 60,
		),*/
        'db' => [
          // 'class' => 'yii\db\Connection',
            'connectionString' => 'mysql:host=mariadb;dbname=logger',
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8',
        ],
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
			    'log/index' => 'log/index',
			    'api/log/list' => 'api/log/list',
			/*	'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',*/
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);