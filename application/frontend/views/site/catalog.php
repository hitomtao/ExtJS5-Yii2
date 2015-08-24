<?php
	use common\models\Category;
	use yii\helpers\Html;
	/* @var $categories Category[] */
	/* @var $parents Category[] */
	/* @var $oneLevelCategory Category Для разделов первого уровня */
	
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
			<h1>КАТАЛОГ ТЕХНИКИ</h1>
			<h2>Компания <strong>"Механика 74"</strong> в числе основной продукции предлагает потребителям:</h2>
			<ul class="breadcrumb pull-right">
				<li><a href="/">Главная</a><span class="divider">/</span></li>
				<?php if(isset($oneLevelCategory->name)): ?>
					<li><a href="/catalog">КАТАЛОГ ТЕХНИКИ</a><span class="divider">/</span></li>
					<li class="active"><?=$oneLevelCategory->name?></li>
				<?php else: ?>
					<li class="active">КАТАЛОГ ТЕХНИКИ</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php if(isset($parents)): ?>
			<ul id="portfolio_filters">
				<li><a href="/catalog" data-filter="*">Все виды</a></li>
				<?php foreach($parents as $parent): ?>
					<li><a href="/catalog/<?=$parent->id?>" data-filter=".category_<?=$parent->id?>"><?=$parent->name?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<div id="portfolio_container" class="portfolio_strict row">
			<?php foreach($categories as $category): ?>
				<div class="portfolio_item category_<?=$category->parent_id?> span4">
					<div class="portfolio_photo" style="background-image:url(<?=$category->logo?>)">
						<?=Html::a('<i class="icon-2x icon-external-link"></i><p>'.$category->description.'</p>', ['category', 'id'=>$category->id])?>
					</div>
					<div class="portfolio_description">
						<h3><?=Html::a($category->name, ['category', 'id'=>$category->id])?></h3>
						<?php /*<p>123123</p>*/ ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?= $this->render('/layouts/main_footer') ?>
</div>
