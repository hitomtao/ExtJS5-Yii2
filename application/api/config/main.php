<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@common/modules/v1',
            'class' => 'common\modules\v1\Module'
        ]
    ],
    'components' => [
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => false,
//        ],
		'user' => [
            'identityClass' => 'yii\web\User',
            'enableAutoLogin' => true,
            'class' => 'yii\web\User',
        ],
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => [
                'user',
                'moderator',
                'admin',
                'superadmin'
            ],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v1/country', 'v1/menu'],
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]

                ]
            ],
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
    ],
    'params' => $params,
];



