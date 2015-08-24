<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $category \common\models\Category */
$this->registerMetaTag(['content' => Yii::$app->metatager->description,'name'=>'description']);
$this->registerMetaTag(['content' => Yii::$app->metatager->keywords,'name'=>'keywords']);

?>
<div id="main">
	<div class="container">
		<?= $this->render('header') ?>
		<h3><?=$category->name?></h3>
		<?php if($category->description): ?>
			<p><?=$category->description?></p>
		<?php endif; ?>
		<?php if($category->embed): ?>
			<div class="embed"><?=$category->embed?></div>
		<?php endif; ?>
		<?php
		
			foreach($category->attachedFiles as $file){
				echo Html::img($file->getUrl(), ['width'=>'100%']);
			}
			
			switch ($category->id) {
				case 31:
					echo GridView::widget([
						'dataProvider' => $dataProvider,
						'columns' => [
							'id_in_schema',
							'kit_code',
							'name',
							['class' => '\common\components\ColumnFoto'],
							//'price',
							//'delivery_time',
						],
					]);
					break;
				
				//Ось L1 12 тонн
				case 33: case 34: 
					echo GridView::widget([
						'dataProvider' => $dataProvider,
						'columns' => [
							'id_in_schema',
							'name',
							'nomenklature_number',
							'number_per_axis',
							['class' => '\common\components\ColumnFoto'],
						],
					]);
					break;
				case 37: case 38: case 39: case 40:
					echo GridView::widget([
						'dataProvider' => $dataProvider,
						'columns' => [
							'id_in_schema',
							'name',
							'nomenklature_number',
							['class' => '\common\components\ColumnFoto'],
						],
					]);
					break;
				
				case 36:
					echo GridView::widget([
						'dataProvider' => $dataProvider,
						'columns' => [
							'name',
							'nomenklature_number',
							['class' => '\common\components\ColumnFoto'],
							'applicability'
						],
					]);
					break;
					
				default:
					echo GridView::widget([
						'dataProvider' => $dataProvider,
						'columns' => [
							'kit_code',
							'name',
							['class' => '\common\components\ColumnSchema'],
							['class' => '\common\components\ColumnFoto'],
							//'price',
							'delivery_time',
						],
					]);
					break;
			}
		?>
	</div>
	<?= $this->render('/layouts/main_footer') ?>
</div>