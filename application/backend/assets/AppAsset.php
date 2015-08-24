<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'extjs5/shared/example.css',
		'extjs5/themes/ext-theme-neptune/build/resources/ext-theme-neptune-all-debug.css',
		'css/icon.css'
    ];
    public $js = [
		'extjs5/ext-all-debug.js',
		'app/app.js',
		'extjs5/themes/ext-theme-neptune/build/ext-theme-neptune-debug.js'
    ];
	
    public $depends = [
        /*'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
	
}
