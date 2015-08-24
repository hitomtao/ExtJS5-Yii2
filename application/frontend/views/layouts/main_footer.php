<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

?>

<footer>
	<section id="twitter_feed_wrapper">
		<div class="container">
			<div class="row">
				<div class="span1 twitter_feed_icon"><a href="#twitter"><i class="icon icon-twitter-sign"></i></a></div>
				<div class="span11">
					<blockquote>
						<p><strong>Закажите</strong> технику у нас и получите <strong>скидку</strong>!</p>
					</blockquote>
				</div>
			</div>
		</div>
	</section>
	<section id="footer_teasers_wrapper">
		<div class="container">
			<div class="row" itemscope itemtype="http://schema.org/Organization">
				<div class="span4 footer_teaser">
					<meta itemprop="url" content="<?=Yii::$app->getUrlManager()->createAbsoluteUrl('')?>" />
					<h3>О нас</h3>
					<p itemscope itemprop="address" itemtype="http://schema.org/PostalAddress"><i class="icon-map-marker"></i> Челябинск, ул. Линейная, 96Б<meta itemprop="addressCountry" content="RU" /><meta itemprop="addressLocality" content="Челябинск" /></p>
					<?php if(yii::$app->controller->id == 'part'): ?>
					<p><i class="icon-gears"></i> <b>Запчасти на полуприцепы</b>:</p>
						<meta itemprop="name" content="Механика 74 - Запчасти на полуприцепы" />
						<p itemprop="telephone"><i class="icon-phone"></i> +7 (351) 223-16-14</p>
						<p itemprop="telephone"><i class="icon-phone"></i> +7 (351) 223-51-88</p>
						<p itemprop="telephone"><i class="icon-phone"></i> +7 (351) 223-51-66</p>
					<?php else: ?>
						<meta itemprop="name" content="Механика 74" />
						<p itemprop="telephone"><i class="icon-phone"></i> +7 (351) 903-00-40</p>
						<p itemprop="telephone"><i class="icon-phone"></i> +7 (351) 223-36-54</p>
						<p itemprop="telephone"><i class="icon-phone"></i> +7 (912) 890-29-81</p>
						<p><i class="icon-skype"></i> traktor 8810</p>
						<p><i class="icon-envelope"></i> 3519030040@mail.ru</p>
					<?php endif; ?>
				</div>
				<div class="span4 footer_teaser">
					<h3>Последние новости</h3>
					<ul class="media-list">
						<li class="media">
							<a href="/catalog/category/7" class="media-photo" style="background-image:url(/images/portfolio/t5.jpg)"></a>
							<a href="/catalog/category/7" class="media-date">20<span>Фев</span></a>
							<h5 class="media-heading">
								<a href="/catalog/category/7">Пополнение техники в разделе "Бульдозеры"</a>
							</h5>
							<p>А также в других разделах...</p>
						</li>
						<li class="media">
							<a href="/" class="media-photo" style="background-image:url(/images/portfolio/t4.jpg)"></a>
							<a href="/" class="media-date">18<span>Фев</span></a>
							<h5 class="media-heading">
								<a href="/">Перейти</a>
							</h5>
							<p>У нас обновился сайт, а также дизайн!</p>
						</li>
					</ul>
				</div>
				<div class="span4 footer_teaser" id="latest-flickr-images">
					<h3>Наши реквизиты</h3>
					<p>ООО «Механика»</p>
					<p>454079, г. Челябинск, ул. Линейная,96Б</p>
					<p>+7(351)223-36-54, 903-00-40</p>
					<p>ИНН 7453251630 / КПП 745201001</p>
					<p>р/с 40702810872000001091</p>
					<p>к/с 30101810700000000602</p>
					<p>Челябинское отделение №8597 Сбербанк России, г. Челябинск</p>
					<p>БИК 047501602, ОГРН 1137453000695</p>
					<p>ОКПО 21474630, ОКАТО 75401386000</p>
					<p>ОКТМО 75701000, ОКОГУ 4210014</p>
					<p>ОКФС 16, ОКОПФ 12165</p>
				</div>
			</div>
		</div>
	</section>
	<section id="copyright">
		<div class="container">
			<div class="row">
				<div class="span6"> Copyright &copy;2012 - <?=date('Y')?> Все права  защищены </div>
				<div class="span6 text-right">  </div>
			</div>
		</div>
	</section>
</footer>