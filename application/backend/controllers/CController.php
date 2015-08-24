<?php

/**
 * Определил общий для всех CRUD контроллер
 *
 * @author Skripov.in <skripov.in@gmail.com>
 */

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

class CController extends Controller {
	/**
	 * Задать модель по умолчанию
	 * Важно! нужно переопределить данное свойство у себя в контроллере
	 * обычно соответствует названию контроллера
	 * пример для DayController будет называйться Day
	 * @var \common\models\YOUR_MODEL
	 */
	public $_params = [
		'model'=>null
	];

//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
//        ];
//    }

//    public function behaviors()
//    {
//	return [
//	    'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
//	    'access' => [
//		'class' => AccessControl::className(),
//		'rules' => [
////		    [
////			'allow' => true,
////			'actions'=>['login','error', 'index'],
////			'roles' => ['?'],
////		    ],
////		    [
////			'allow' => true,
////			'roles' => ['moder', 'admin'],
////		    ],
//                    [
//                        'allow' => true,
//                        'roles' => ['admin'],
//                    ],
//                    [
//                        'actions' => ['index', 'view'],
//                        'allow' => true,
//                        'roles' => ['moder'],
//                    ],
//                    
//		],
//                
//	    ],
//	];
//    }
    
//        public function behaviors()
//        {
//            return [
//                'access' => [
//                    'class' => AccessControl::className(),
//                    'rules' => [
//                        [
//                            'allow' => true,
//                            'actions'=>['index','view'],
//                            'roles' => ['?'],
//                        ],
//                        [
//                            'allow' => true,
//                            'roles' => ['admin'],
//                        ],
//                    ],
//                ],
//            ];
//        }
        /**
         * Все экшены доступны только админам. 
            В любом месте приложения можно  вызывать
            If (Yii::$app->user->can('admin')) { … }    
            Для проверки роли пользователя.
         */
        
        public function behaviors()
        {
            return [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        //'create' => ['post'],
                        'delete' => ['post'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
            ];
        }

        
    

    /**
     * Получить модель
     * @return string
     */
    protected function getModel() {
	if(isset($this->_params['model'])){
		return $this->_params['model'];
	} else {
	    return "\common\models\\" . ucfirst($this->id);
	}
    }

    /**
     * Lists all your models.
     * @return mixed
     */
    public function actionIndex()
    {
	$modelName = $this->getModel();
	$model = new $modelName;
	$dataProvider = new ActiveDataProvider([
            'query' => $model::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single your model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new your model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelName = $this->getModel();
		$model = new $modelName;
		$model->dt_create = date('c');
		$model->dt_update = date('c');
		$model->id_user_create = 1;
		$model->id_user_update = 1;
	
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			         
					return $this->redirect(['index']);
			
        } else {
            
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing your model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	
	
		$modelName = $this->getModel();
        $model = $this->findModel($id);
		$model->dt_update = date('c');
		$model->id_user_create = 1;
		$model->id_user_update = 1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
		
                         
					return $this->redirect(['index']);
         
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing your model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the your model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Day the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $modelName = $this->getModel();
		$model = new $modelName;
		if (($data = $model::findOne($id)) !== null) {
            return $data;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
