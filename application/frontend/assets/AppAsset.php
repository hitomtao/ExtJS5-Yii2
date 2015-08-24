<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'less/animate.less-master/animate.css',
        'fonts/font-awesome/css/font-awesome.min.css',
        'js/woothemes-FlexSlider-06b12f8/flexslider.css',
		'js/prettyPhoto_3.1.5/prettyPhoto.css',
    ];
    public $js = [
		'js/jquery-1.9.0.min.js',
		'js/modernizr.custom.48287.js',
		'twitter-bootstrap/js/bootstrap.min.js',
		'js/modernizr.custom.48287.js',
		'js/woothemes-FlexSlider-06b12f8/jquery.flexslider-min.js',
		'js/prettyPhoto_3.1.5/jquery.prettyPhoto.js',
		'js/isotope/jquery.isotope.min.js',
		'js/jquery.ui.totop.js',
		'js/easing.js',
		'js/restart_theme.js',

    ];
    public $depends = [
//        'yii\web\YiiAsset', //jquery тут сама подтянется, не дублировать!
//		'yii\bootstrap\BootstrapAsset',
    ];
	
	public $css_parts = [
		'parts/font/fonts.css',
		'parts/js/jquery.countdown.css',
		'parts/css/global.css',
		'parts/css/jquery-ui.css',
	];
	
	public $js_parts = [
		'parts/js/jquery.1.8.1.min.js',
		'parts/js/jquery-ui1.9.1.min.js',
		'parts/js/libs/modernizr-2.6.1.min.js',
		'parts/js/jquery.maskedinput.min.js',
		'parts/js/main.js',
		'parts/js/slides.js',
	];
	
	public function registerAssetFiles(View $view)
    {
		$manager = $view->getAssetManager();
		
		$arr_js = $this->js;
		$arr_css = $this->css;
		
		if(isset($view->context->layout) && $view->context->layout === 'parts'){
			$arr_js = $this->js_parts;
			$arr_css = $this->css_parts;
		}
		
        foreach ($arr_js as $js) {
            $view->registerJsFile($manager->getAssetUrl($this, $js), $this->jsOptions);
        }
        foreach ($arr_css as $css) {
            $view->registerCssFile($manager->getAssetUrl($this, $css), $this->cssOptions);
        }
    }
}
