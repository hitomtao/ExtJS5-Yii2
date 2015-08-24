<?php

namespace backend\controllers;

use Yii;
use common\models\Enterprise;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\web\Session;


/**
 * EnterpriseController implements the CRUD actions for Enterprise model.
 */
class EnterpriseController extends CController
{
    public $_params = [
		'model'=>'\common\models\Enterprise'
	];
    
    public function actionContacts() {
           $session = Yii::$app->session;
           $user_id = $session->get('user_id');
           
            //телефон, адрес, координаты
            $contacts = \common\models\Enterprise::findOne(['enabled'=>1]);
            
            
            
                return $this->render('/enterprise/contacts', ['contacts'=>$contacts]);
            

    }
    
    
}
