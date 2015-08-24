<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Part */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Запчасти', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php 
		
		echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'name',
			'short_description:ntext',
            'description:ntext',
			'kit_code',
			'price',
			'delivery_time',
        ],
    ]) 
		
		?>

	<?php
//	echo \common\modules\attachments\components\AttachmentsTable::widget(['model' => $model]);
			?>

</div>
