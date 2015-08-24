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
			<h1>Устав компании</h1>
		</div>
		<p><img src="/uploads/docs/ustav/1.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/2.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/3.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/4.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/5.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/6.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/7.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/8.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/9.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/10.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/11.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/12.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/13.jpg" alt="Устав компании" /></p>
		<p><img src="/uploads/docs/ustav/14.jpg" alt="Устав компании" /></p>
	</div>
	<?= $this->render('/layouts/main_footer') ?>
</div>