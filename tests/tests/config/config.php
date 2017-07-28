<?php
/**
 * Application configuration shared by all test types
 */
return [
	'id' => 'grptx-yii2-firebase-test',
	'basePath' => dirname(dirname(__DIR__)), // @tests
	'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/vendor',
	'language' => 'en-US',

	'controllerMap' => [
		'fixture' => [
			'class' => 'yii\console\controllers\FixtureController',
			'namespace' => 'tests\codeception\fixtures',
		],

	],
	'components' => [
		'mailer' => [
			'useFileTransport' => true,
		],
		'urlManager' => [
			'showScriptName' => true,
		],
		'authManager' => [
			'class' => 'yii\rbac\DbManager'
		],
		'cache' => [
			'class' => 'yii\caching\DummyCache',
		],
		'firebase' => [
			'class'=>'grptx\tests\FirebaseTest',

			'database_uri'=>'https://yii2-firebase-2ed8f.firebaseio.com', // (optional)
		]
	],
];