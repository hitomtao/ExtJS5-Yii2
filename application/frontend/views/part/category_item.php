<?php
	use common\models\Category;
	use yii\helpers\Html;
	/* @var $category Category[] */

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
			<h1><?=$category->name?></h1>
			<h2>Запчасти ADR, BMT, L1, SAE, SAF, BPW, GIGANT для тралов, полуприцепов, прицепов HARTUNG, ЧМЗАП, ТСП</h2>
			<ul class="breadcrumb pull-right">
				<li><a href="/">Главная</a><span class="divider">/</span></li>
				<li><a href="/catalog">КАТАЛОГ ТЕХНИКИ</a></li>
			</ul>
		</div>
		<div id="portfolio_container" class="portfolio_strict row">
			<?php if(!empty($category->parts)): ?>
				<table border="1">
					<tr>
						<th>Kit code</th>
						<th>Наименование</th>
						<th>Схема</th>
						<th>Фото</th>
						<th>Цена в евро</th>
						<th>Срок поставки</th>
					</tr>
				<?php foreach($category->parts as $part): ?>
					<tr>
						<td><?=$part->kit_code?></td>
						<td><?=$part->name?></td>
						<td></td>
						<td></td>
						<td><?=$part->price?></td>
						<td><?=$part->delivery_time?></td>
					</tr>
				<?php endforeach; ?>
				</table>
			<?php else: ?>
				<?php throw new \yii\web\NotFoundHttpException('Товаров нет') ?>
			<?php endif; ?>
		</div>
	</div>
	<?= $this->render('/layouts/main_footer') ?>
</div>