<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
       'urlManager' =>[
            'enablePrettyUrl' => true,
            'showScriptName' => false,
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
        'user' => [
            'identityClass' => 'yii\web\User',
            'enableAutoLogin' => true,
            'class' => 'yii\web\User',
        ],
    ],
	'modules' => [
		'attachments' => [
			'class' => \common\modules\attachments\Module::className(),
			'tempPath' => '@frontend/web/uploads/tmp',
			'storePath' => '@frontend/web/uploads/store',
			'rules' => [ // Rules according to the FileValidator
				//'mimeTypes' => 'image/png', // Only png images
				'maxSize' => 1024 * 1024 * 10 // 10 MB
			]
		]
	],
];
