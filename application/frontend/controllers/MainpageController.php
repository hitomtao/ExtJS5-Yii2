<?php

namespace frontend\controllers;
use common\models\Quest;
class MainpageController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$allQuests = Quest::getAll();
		
		return $this->render('index',['allQuests'=>$allQuests]);
	
	
   
    }

}
