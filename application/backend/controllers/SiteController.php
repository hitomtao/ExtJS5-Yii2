<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\QuestReservation;
use common\models\Base;
use yii\data\ActiveDataProvider;

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
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'test'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'menu'],
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
        ];
    }

    public function actionIndex()
    {
		return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
	public function actionMenu()
    {
        $out = array(
			array(
				'text' => "Настройки",
				'iconCls' => 'icon-cog',
				'children' => array(
					array(
					'text' => "Пользователи",
					'iconCls' => 'icon-user',
					'action' => 'User:list',
					'role' => '123',
					'leaf' => true
					)
				),
			),
			
			array(
				'text' => "Test",
				'iconCls' => 'icon-grid',
				'action' => 'User:test',
				'role' => '123',
				'leaf' => true
			),
			
			array(
				'text' => "Test grid",
				'iconCls' => 'icon-grid',
				'action' => 'User:grid',
				'role' => '123',
				'leaf' => true
			)
		);
		
		echo json_encode($out);
		return;
    }
}
