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
use common\models\Product;
use yii\web\NotFoundHttpException;
use common\models\Part;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
		Yii::$app->opengraph->title = Seo::Settings()->title;
		Yii::$app->opengraph->description = Seo::Settings()->description;
		Yii::$app->opengraph->image = 'http://xn--90agaunhfc3b5f.xn--p1ai/images/regularSprites/logoIQ174.png';

		Yii::$app->opengraph->twitter->card = 'summary';
		Yii::$app->opengraph->twitter->site = '@Webtest74';
		Yii::$app->opengraph->twitter->creator = '@Webtest74';
		
		$ids = [];
		foreach(Part::find()->where('file_foto != ""')->all() as $part){
			$ids[$part->id] = null;
		}
		$parts = Part::find()->where(['in', 'id', array_rand($ids, 12)])->all();
		return $this->render('index', ['parts'=>$parts]);
    }

	public function actionCatalog($id=null) {
		if($id){
			$categories = Category::findAll(['parent_id'=>$id]);
			if($categories===NULL){
				throw new NotFoundHttpException("Категория {$id} не найдена");
			}
			$oneLevelCategory = Category::findOne(['id'=>$id]);

			$this->getView()->title = "Mexanika 74 - Каталог техники: " . $oneLevelCategory->name . " - " . \common\components\Htmlhelper::getMetaList($categories);

			return $this->render('catalog', ['categories'=>$categories, 'oneLevelCategory'=>$oneLevelCategory]);
		} else {
			//получить разделы у "Каталог техники"
			$partions = Category::getPartions(Category::TECHNICS_ID);
			//получить все категории, входящие в разделы
			$oneLvl = Category::getFirstLevel(Category::TECHNICS_ID);
			$this->getView()->title = "Mexanika 74 - Каталог техники: " . \common\components\Htmlhelper::getMetaList($partions);
			return $this->render('catalog', ['categories'=>$oneLvl, 'parents'=>$partions]);
		}
	}

	public function actionCategory($id=null) {
		$category = Category::findOne(['id'=>$id]);
		if($category===NULL){
			throw new NotFoundHttpException("Категория {$id} не найдена");
		}
		$this->getView()->title = "Mexanika 74 - Каталог техники: категория " . $category->name;
		return $this->render('category_item', ['category'=>$category]);
	}

	public function actionProduct($id) {
		if($id){
			$product = Product::findOne(['id'=>$id]);
			if($product===NULL){
				throw new NotFoundHttpException("Товар № {$id} не найден");
			}
			$this->getView()->title = "Mexanika 74 - Каталог техники: " . $product->name;
			return $this->render('product_item', ['product'=>$product]);
		}
	}

	public function actionContacts() {
		return $this->render('contacts');
	}

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionUstav()
    {
        return $this->render('ustav');
    }

	public function actionPartners()
    {
        return $this->render('partners');
    }

	public function actionError() {
		return $this->render('error');
	}

}
