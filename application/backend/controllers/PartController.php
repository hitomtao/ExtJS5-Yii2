<?php

namespace backend\controllers;

use Yii;
use common\models\Part;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;

/**
 * ProductController implements the CRUD actions for Part model.
 */
class PartController extends Controller
{
    public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['admin', 'user'],
					],
				],
			],
		];
	}

	public function actions()
	{
		return [
			'fileapi-upload' => [
				'class' => FileAPIUpload::className(),
				'path' => '@frontend/web/uploads/tmp'
			]
		];
	}

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex($category=null)
    {
        $query = Part::find();
		if($category>0){
			$query->andWhere(['category_id'=>$category]);
		}

		$dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['defaultOrder' => ['kit_code'=>SORT_ASC]],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
			'category_id' => $category
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($category_id=null)
    {
        $model = new Part();

        if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				return $this->redirect(['index', 'category' => $model->category_id]);
			}
        } else {
			if($category_id){
				$model->category_id = $category_id;
			}
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'category' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Part::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
