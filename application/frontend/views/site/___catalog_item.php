<?php
	use common\models\Category;
	use yii\helpers\Html;
	/* @var $category Category[] */
	
?>
<div id="main">
	<div class="container">
		<div class="hgroup">
			<h1><?=$category->name?></h1>
			<ul class="breadcrumb pull-right">
				<li><a href="/">Главная</a><span class="divider">/</span></li>
				<li><a href="/catalog">КАТАЛОГ ТЕХНИКИ</a></li>
			</ul>
		</div>
		<div id="portfolio_container" class="portfolio_strict row">
			<?php if(!empty($category->products)): ?>
				<?php foreach($category->products as $product): ?>
					<div class="portfolio_item span4">
						<div class="portfolio_photo" style="background-image:url(<?=$product->getLogoUtl()?>)">
							<?=Html::a('<i class="icon-2x icon-external-link"></i><p>'.$product->short_description.'</p>', ['product', 'id'=>$product->id])?>
						</div>
						<div class="portfolio_description">
							<h3><?=Html::a($product->name, ['product', 'id'=>$product->id])?></h3>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<?php throw new \yii\web\NotFoundHttpException('Товаров нет') ?>
			<?php endif; ?>
		</div>
	</div>
	<?= $this->render('/layouts/main_footer') ?>
</div>