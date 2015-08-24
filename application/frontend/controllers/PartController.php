<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;
use common\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Seo;
use common\models\Category;
use common\models\Part;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
/**
 * Description of PartController
 *
 * @author Петя
 */
class PartController extends Controller {

	public function actionIndex() {
		//получить разделы у "Запчасти"
		$partions = Category::getPartions(Category::PARTS_ID);
		return $this->render('index', ['partions'=>$partions]);
	}

	public function actionCategory($id) {
		$category = Category::findOne(['id'=>$id]);
		if($category===NULL){
			throw new NotFoundHttpException("Категория {$id} не найдена");
		}
		$this->getView()->title = "Mexanika 74 - Запчасти: категория " . $category->name;
		//return $this->render('category_item', ['category'=>$category]);

		if(!Category::findOne(['parent_id'=>$category->id])){
			$dataProvider = new ActiveDataProvider([
				'query' => $category->getParts(),
			]);

			return $this->render('list', [
				'dataProvider' => $dataProvider,
				'category' => $category
			]);
		} else {
			$partions = Category::getPartions($category->id);
			return $this->render('index', ['partions'=>$partions]);
		}




	}

	public function actionPromo() {
		$this->layout = 'parts';
		$ids = [];
		foreach(Part::find()->where('file_foto != ""')->all() as $part){
			$ids[$part->id] = null;
		}
		$parts = Part::find()->where(['in', 'id', array_rand($ids, 8)])->all();
		return $this->render('promo', ['parts'=>$parts]);
	}
}
