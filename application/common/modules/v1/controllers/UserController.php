<?php

namespace common\modules\v1\controllers;

use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\web\Request;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use common\models\Session;


/**
 * Country Controller API
 *
 * @author Ivan Skripov <skripov.in@gmail.com>
 */
class UserController extends ActiveController
{
    //public $modelClass = 'api\modules\v1\models\Country';   
    public $modelClass = 'common\models\User';
	
	public function behaviors(){
		$behaviors = parent::behaviors();
		$behaviors['authenticator'] = [
			'class' => CompositeAuth::className(),
			'authMethods' => [
				HttpBasicAuth::className()
			],
		];
		return $behaviors;
	}
	
	public function actionLogin(){
//		$request = new Request();
//		$headers = $request->getHeaders();
//		$access_token = $headers->get('Authorization');
		//print_r($access_token);die;
		
		/**
		 * если авторизация успешная,
		 * в таблицу временных токенов вставляется новый токен
		 * на определенное время жизни,
		 * и возвращается назад в ExtJs
		 * 
		 * 
		 */
		if(!Yii::$app->user->isGuest){
			$session = new Session();
			$session->createToken(Yii::$app->user->id);
			return $session;
		}
//		return "Облом";
//		return "login - " . $_SERVER['PHP_AUTH_USER'] . " password " . $_SERVER['PHP_AUTH_PW'];
//		return [
//			'token' => $access_token,
//			'expires_in' => 3600,
//			'token_type' => 'basic',
//			'scope' => null
//		];
	}
	
	
}


