<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Url;
	use himiklab\thumbnail\EasyThumbnailImage;

	/* @var $this yii\web\View */
	/* @var $form yii\bootstrap\ActiveForm */
	$this->title = Yii::$app->metatager->title;
	$this->registerMetaTag(['content' => Yii::$app->metatager->description,'name'=>'description']); 
	$this->registerMetaTag(['content' => Yii::$app->metatager->keywords,'name'=>'keywords']); 
	/* @var $parts \common\models\Part[] */
?>

<section id="slider_wrapper">
	<div id="main_flexslider" class="flexslider">
		<ul class="slides">
			<li class="item" style="background-image: url(/images/front/one.jpg)">
				<a href="/catalog/product/3">
					<div class="container">
						<div class="carousel-caption">
							<h1>Уникальное <strong>предложение</strong></h1>
							<p class="lead inverse">
								<strong>Бульдозер Б10М.0101Е</strong>
								Двигатель Д-180, предпусковой подогрев дизеля Webasto, защита двигателя и трансмиссии, гарантийный срок - 12 месяцев или 1500 м.ч.
								<strong>В наличии</strong>
							</p>
							<span class="round_badge"><strong>ЛУЧШАЯ</strong>цена</span>
						</div>
					</div>
				</a>
			</li>
			<li class="item" style="background-image: url(/images/front/coper.jpg)">
				<a href="">
					<div class="container">
						<div class="carousel-caption">
							<h1>Сваебой <strong>(копер)</strong>, сваебойная установка</h1>
							<p class="lead inverse">
								<strong>Копровая установка</strong> является надежной и высокопроизводительной машиной, способной погружать трубы и сваи до <strong>14</strong> метров длиной и весом до <strong>5</strong> тонн
							</p>
						</div>
					</div>
				</a>
			</li>
			<li class="item" style="background-image: url(/images/front/two.jpg)">
				<a href="/catalog/product/4">
					<div class="container">
						<?php /*<div class="carousel-caption">
							<h1>makes <strong>real use</strong><br>
								 of the power of <strong>{/less}</strong> syntax!</h1>
							<p class="lead inverse">{re}start was built with heavy use of {/less} technology, making the life of the web developer easier!</p>
						</div>*/ ?>
					</div>
				</a>
			</li>
			<li class="item" style="background-image: url(/images/front/three.jpg)">
				<div class="container">
					<?php /*<div class="carousel-caption">
						<h1 class="inverse"><strong>subtle</strong> animations<br>
							 &amp; a <strong>fresh</strong> collapsing <strong>header effect</strong></h1>
						<p class="lead">if you are looking for <a href="services.html"><strong>a bold approach</strong></a> you will love the header effect,<br>
							 but even if you like <a href="page_alternative.html"><strong>a more conservative feel</strong></a>, you can always try the boxed alternative!</p>
					</div>*/ ?>
				</div>
			</li>
		</ul>
	</div>
</section>

<div id="main">
	<div class="container">
		<section class="call_to_action">
			<h3>Компания ООО «Механика»</h3>
			<h4>Ведущий поставщик дорожно-строительной техники производства</h4>
			<a class="btn btn-primary btn-large" href="/catalog">Выбрать технику!</a>
		</section>
		<section id="features_teasers_wrapper">
			<div class="row">
				<div class="span4 feature_teaser"> <img alt="responsive" src="/images/responsive.png" />
					<h3>Прямые поставки</h3>
					<p><strong>Компания «Механика»</strong> производит поставку различной <strong>прицепной техники</strong> под брендом HARTUNG: полуприцепы-тяжеловозы (тралы) низкорамные и высокорамные грузоподъёмностью от 15 до 100т.</p>
				</div>
				<div class="span4 feature_teaser"> <img alt="responsive" src="/images/balka.png" />
					<h3>Большой выбор запчастей</h3>
					<p>Продукция фирмы <strong>ADR</strong>, предлагаемая нашей компанией, отличается высоким качеством, надежностью и  длительным сроком эксплуатации в тяжелых условиях.</p>
				</div>
				<div class="span4 feature_teaser"> <img alt="responsive" src="/images/best_price.png" />
					<h3>Низкие цены</h3>
					<p>Вы хотите купить <strong>дешевую спецтехнику</strong> (возможно с навесным оборудованием) и поэтому оказались на нашем сайте. <strong>Вы не ошиблись</strong> в своем выборе.</p>
				</div>
			</div>
		</section>
		<section id="portfolio_teasers_wrapper">
			<h2 class="section_header">Запчасти ADR, BMT, L1, SAE, SAF, BPW, GIGANT для тралов, полуприцепов, прицепов HARTUNG, ЧМЗАП, ТСП</h2>
			<div class="portfolio_strict row">
				<?php foreach($parts as $part): ?>
					<div class="portfolio_item span3">
						<div class="portfolio_photo" style="background-image:url(<?= EasyThumbnailImage::thumbnailFileUrl($part->getFotoAliasUrl(), 200, 200)?>)">
							<?=Html::a('<i class="icon-2x icon-external-link"></i><p>Посмотреть запчать в каталоге...</p>', ['part/category', 'id'=>$part->category_id])?>
						</div>
						<div class="portfolio_description">
							<h3>
								<?=Html::a($part->name, ['part/category', 'id'=>$part->category_id])?>
							</h3>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<section class="call_to_action">
				<h4>ООО «Механика» - это идеальное состояние Вашей техники</h4>
				<a class="btn btn-primary btn-large" href="/part">Выбрать запчасти!</a>
			</section>
		</section>
	</div>
	<?= $this->render('/layouts/main_footer') ?>
</div>
