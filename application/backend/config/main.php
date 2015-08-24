<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
	'defaultRoute' => 'site/index',
	'modules' => [
        'v1' => [
            'basePath' => '@common/modules/v1',
            'class' => 'common\modules\v1\Module'
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
			'enableSession' => false,
			'loginUrl' => null,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'urlManager' => [
			'enablePrettyUrl' => true,
//            'enableStrictParsing' => true,
            'showScriptName' => false,
            // here is your backend URL rules
			'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
					'controller' => ['v1/country', 'v1/menu'],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                    ],
                ],
				[
					'class' => 'yii\rest\UrlRule',
					'controller' => ['v1/user'],
					'extraPatterns' => [
						'POST login' => 'login',
					],
				]
            ],
        ],
		'request' => [
			'class' => '\yii\web\Request',
			'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
//        'urlManagerFrontEnd' => [
//            'class' => 'yii\web\urlManager',
//            'baseUrl' => '/a/frontend/web',
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//
//        ],
    ],
    'params' => $params,
];
