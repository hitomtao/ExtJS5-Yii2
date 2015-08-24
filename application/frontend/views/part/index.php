<?php
	use common\models\Category;
	use yii\helpers\Html;

	use yii\bootstrap\ActiveForm;
	use yii\helpers\Url;

	/* @var $this yii\web\View */
	/* @var $form yii\bootstrap\ActiveForm */
	$this->title = Yii::$app->metatager->title;
	$this->registerMetaTag(['content' => Yii::$app->metatager->description,'name'=>'description']);
	$this->registerMetaTag(['content' => Yii::$app->metatager->keywords,'name'=>'keywords']);
	/* @var $partions Category[] */
?>
<div id="main">
	<div class="container">
		<?= $this->render('header') ?>
		<div class="container">
			<h2>Разделы</h2>
			<ul>
				<?php foreach($partions as $partion): ?>
				<li><?=Html::a($partion->name, ['part/category', 'id'=>$partion->id])?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<?= $this->render('/layouts/main_footer') ?>
</div>