<?php

namespace frontend\controllers;
use Yii;

use common\models\Enterprise;
use common\models\Seo;
class CompanyController extends SiteController
{
    public function actionContact()
    {
	
	
		 $enterprise_data = Enterprise::About();
		 Yii::$app->opengraph->title =  Seo::Settings()->title;
         Yii::$app->opengraph->description = Seo::Settings()->description;
         Yii::$app->opengraph->image = 'http://xn--90agaunhfc3b5f.xn--p1ai/images/regularSprites/logoIQ174.png';
         Yii::$app->opengraph->twitter->card = 'summary';
         Yii::$app->opengraph->twitter->site = '@Webtest74';
         Yii::$app->opengraph->twitter->creator = '@Webtest74';
		return $this->render('contact',['enterprise'=>$enterprise_data]);
    }
    public function actionAbout()
    {

		$enterprise_data = Enterprise::About();
		 Yii::$app->opengraph->title =  Seo::Settings()->title;
         Yii::$app->opengraph->description = Seo::Settings()->description;
         Yii::$app->opengraph->image = 'http://xn--90agaunhfc3b5f.xn--p1ai/images/regularSprites/logoIQ174.png';
         Yii::$app->opengraph->twitter->card = 'summary';
         Yii::$app->opengraph->twitter->site = '@Webtest74';
         Yii::$app->opengraph->twitter->creator = '@Webtest74';
		return $this->render('about',['enterprise'=>$enterprise_data]);
    }
    public function actionPartnership()
    {

        $enterprise_data = Enterprise::About();
         Yii::$app->opengraph->title =  Seo::Settings()->title;
         Yii::$app->opengraph->description = Seo::Settings()->description;
         Yii::$app->opengraph->image = 'http://xn--90agaunhfc3b5f.xn--p1ai/images/regularSprites/logoIQ174.png';
         Yii::$app->opengraph->twitter->card = 'summary';
         Yii::$app->opengraph->twitter->site = '@Webtest74';
         Yii::$app->opengraph->twitter->creator = '@Webtest74';
        return $this->render('about',['enterprise'=>$enterprise_data]);
    }

}
