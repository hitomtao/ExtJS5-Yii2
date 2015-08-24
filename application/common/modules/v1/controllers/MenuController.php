<?php

namespace common\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Контроллер для меню админ панели
 * 
 * @author Ivan Skripov <skripov.in@gmail.com>
 */
class MenuController extends ActiveController
{
    public $modelClass = '';
	
	/**
     * @inheritdoc
     */
    public function actions()
    {
        return [];
	}
	
	public function actionIndex() {
		header('Access-Control-Allow-Origin: *');
		$data = require_once dirname(__FILE__).'/../../../config/adminmenu.php';
		return $data;
	}
	
	public function actionOptions() {
		header('HTTP/1.0 200 OK'); 
		header('Access-Control-Allow-Origin: *'); 
		header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); 
		header('Access-Control-Allow-Headers: X-Requested-With');
	}
	
}


