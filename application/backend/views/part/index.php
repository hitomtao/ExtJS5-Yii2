<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $category_id Category */

$this->title = 'Запчасти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<form class="category-end" action="<?=Url::to('')?>" method="get">
		<select class="category-setter form-control" name="category">
			<?php foreach(Category::find()->all() as $category): ?>
				<option <?=$category_id==$category->id ? "selected='selected'" : ""?> value="<?=$category->id?>"><?=$category->name?></option>
			<?php endforeach; ?>
		</select>
		<br />
	</form>

    <p>
        <?= Html::a('Создать', ['create', 'category_id'=>$category_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			'kit_code',
            'category.name',
            'name',
            //'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
