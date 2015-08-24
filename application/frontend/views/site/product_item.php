<?php
	use common\models\Product;
	use yii\helpers\Html;
	/* @var $product Product */
	
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Url;

	/* @var $this yii\web\View */
	/* @var $form yii\bootstrap\ActiveForm */
	$this->title = "Механика 74 - Каталог - " . Yii::$app->metatager->title;
	$this->registerMetaTag(['content' => Yii::$app->metatager->description,'name'=>'description']); 
	$this->registerMetaTag(['content' => Yii::$app->metatager->keywords,'name'=>'keywords']);
?>
<div id="main">
	<div itemscope itemtype="http://schema.org/Product" class="container">
		<meta itemprop="productID" content="<?=$product->id?>" />
		<meta itemprop="url" content="<?=Url::canonical()?>" />
		<meta itemprop="name" content="<?=$product->name?>" />
		<meta itemprop="description" content="<?=Yii::$app->metatager->description?>" />
		<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="price">
			<meta itemprop="price" content="Уточните" />
			<meta itemprop="priceCurrency" content = "RUB" />
			<meta itemprop="validFrom" content="<?=date('c')?>" />
			<meta itemprop="availability" content="http://schema.org/InStock" />
		</div>
		<section id="portfolio_item">
			<div class="hgroup">
				<h1><?=$product->name?></h1>
				<h2><?=$product->short_description?></h2>
				<ul class="breadcrumb pull-right">
					<li><a href="/">Главная</a><span class="divider">/</span></li>
					<li><a href="/catalog">КАТАЛОГ ТЕХНИКИ</a><span class="divider">/</span></li>
					<li><?=Html::a($product->category->name, ['category', 'id'=>$product->category_id])?></li>
				</ul>
			</div>
			<section id="portfolio_slider_wrapper">
				<div class="flexslider" id="portfolio_slider">
					<ul class="slides">
						<?php foreach ($product->photos as $photo): ?>
							<li class="item" data-thumb="<?=$photo->url?>" style="background-image: url(<?=$photo->url?>)">
								<div class="container"><a href="<?=$photo->url?>" rel="prettyPhoto[gal]"></a>
									<?php /*<div class="carousel-caption">
										<p class="lead"><?=nl2br($photo->description)?></p>
									</div>*/ ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div id="carousel" class="flexslider">
					<ul class="slides">
						<?php foreach ($product->photos as $photo): ?>
							<li><img src="<?=$photo->url?>" alt="" /></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</section>
			<article>
				<div class="row">
					<div class="span9">
						<div class="well"><?=$product->description?></div>
					</div>
					<div class="span3 well border-box">
						<p><strong>Nulla tristique:</strong> Donec aliquet</p>
						<p><strong>Habitasse platea:</strong> Dictumst</p>
						<p><strong>Ornare sit:</strong> Ninec risus</p>
						<p><strong>Faucibus volutpat:</strong> Bullamcorper</p>
					</div>
				</div>
			</article>
		</section>
	</div>
	<?= $this->render('/layouts/main_footer') ?>
</div>