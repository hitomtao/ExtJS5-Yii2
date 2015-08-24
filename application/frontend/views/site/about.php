<?php
	use yii\helpers\Html;

	/* @var $this yii\web\View */

	use yii\bootstrap\ActiveForm;
	use yii\helpers\Url;

	/* @var $this yii\web\View */
	/* @var $form yii\bootstrap\ActiveForm */
	$this->title = Yii::$app->metatager->title;
	$this->registerMetaTag(['content' => Yii::$app->metatager->description,'name'=>'description']); 
	$this->registerMetaTag(['content' => Yii::$app->metatager->keywords,'name'=>'keywords']);
?>
<div id="main">
	<div class="container">
		<div class="hgroup">
			<h1><?= Html::encode($this->title) ?></h1>
		</div>
		<p><img src="/uploads/docs/card.jpg" alt="Карточка компании Механика" /></p>
		<p><a href="/about/ustav"><h2>Устав компании</h2></a></p>
		<p><img src="/uploads/docs/fns.jpg" alt="" /></p>
		<p><img src="/uploads/docs/fns2.jpg" alt="" /></p>
		<p><img src="/uploads/docs/fns3.jpg" alt="" /></p>
	</div>
	<?= $this->render('/layouts/main_footer') ?>
</div>