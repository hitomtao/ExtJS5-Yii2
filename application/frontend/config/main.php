<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'name' => 'mexanika',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['admin']
        ],
    ],
    'components' => [
		'thumbnail' => [
			'class' => 'himiklab\thumbnail\EasyThumbnail',
			'cacheAlias' => '@frontend/web/uploads/thumbnails',
		],
        'log' => [
            // 'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'opengraph' => [
        'class' => 'dragonjet\opengraph\OpenGraph',
        ],
        'meta' => [
        'class' => 'ptheofan\meta\Meta',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' =>[
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
				'about' => 'site/about',
				'about/ustav' => 'site/ustav',
                'catalog/' => 'site/catalog',
                'catalog/<id>' => 'site/catalog',
				'catalog/category/<id>' => 'site/category',
                'catalog/product/<id>' => 'site/product',
				'partners' => 'site/partners',
				'part' => 'part/index',
				'part/category/<id>' => 'part/category',
				'contacts' => 'site/contacts',
				'/' => 'site/index',
            ],

        ],
		'assetManager' => [
//            'bundles' => [
////                'yii\bootstrap\BootstrapAsset' => [
////                        'css' => []
////                ],
//            ],
//			'appendTimestamp' => true,
        ],
		'metatager' => array(
			'class' => '\common\components\Metatager'
		),
    ],
    'params' => $params,

];
