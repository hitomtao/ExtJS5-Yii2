<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use common\models\Enterprise;
use common\models\Seo;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>


<!doctype html>
    <!--[if lt IE 7]>
		<html class="no-js lt-ie9 lt-ie8 lt-ie7" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="ru-RU">
	<![endif]-->
    <!--[if IE 7]>
		<html class="no-js lt-ie9 lt-ie8" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="ru-RU">
	<![endif]-->
    <!--[if IE 8]>
		<html class="no-js lt-ie9" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="ru-RU">
	<![endif]-->
    <!--[if gt IE 8]><!-->
		<html class="no-js" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="ru-RU"> 
		<!--<![endif]-->
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <title><?=Seo::Settings()->title?></title>
		<?= Html::csrfMetaTags() ?>
        <!-- Open graph mark up -->
        <meta property="place:location:latitude" content="<?=Enterprise::About()->MapY?>"/>
        <meta property="place:location:longitude" content="<?=Enterprise::About()->MapX?>"/>
        <meta property="business:contact_data:street_address" content="<?=Enterprise::About()->street?>"/>
        <meta property="business:contact_data:locality" content="<?=Enterprise::About()->city?>"/>
        <meta property="business:contact_data:postal_code" content="454000"/>
        <meta property="business:contact_data:country_name" content="Россия"/>
        <meta property="business:contact_data:email" content="<?=Enterprise::About()->email?>"/>
        <meta property="business:contact_data:phone_number" content="<?=Enterprise::About()->phone?>"/>
        <meta property="business:contact_data:website" content=""/>
        <!-- Google meta tags -->
        
        <meta itemprop="name" content=""/>
        <meta itemprop="description" content=""/>
        <meta name="Keywords" content="">
        <link rel="shortcut icon" href="/parts/favicon.png" />
        <?php $this->head() ?>
    </head>
    <body>
		<?php $this->beginBody() ?>

		<!-- /////////////////////////// Поп-ап \\\\\\\\\\\\\\\\\\\\\\\\ -->
		<div class="center-980-pop">
			  <a href="#x" class="overlay-zvonokt" id="wind-zakaz-top"></a>  
			  <div class="popup-zvonokt">
				<div class="wind-zakaz-top">
				  <p><span class="bold">ЗАПОЛНИТЕ ФОРМУ</span> И МЫ ВАМ<br>ОБЯЗАТЕЛЬНО ПЕРЕЗВОНИМ</p>
				 <form class="s_form" action="index1.php" method="POST">          
				  <input class="s_text nameinp sinp" type="text" name="name" placeholder="Введите ваше имя*">          
				  <input class="s_text phoneinp sinp" type="text" name="phone" placeholder="Введите ваш телефон*">
				  <input type="hidden"  name="email" class="email" value="none@none.ru">
				  <input type="hidden"  name="adress" class="email" value="none">          
				  <input type="hidden" value="C" name="button">
				  <input type="hidden"  name="comment" value="None">
				  <input class="s_submit" type="button" value="ОТПРАВИТЬ">
				</form>
				</div>       
			  </div>
			<a href="#x" class="fixed-overlay-zvonokt" id="wind-zakaz-fixed"></a>  
			  <div class="popup-zvonok-fixed">
				<div class="wind-zakaz-fix">
				  <p><span class="bold">ЗАПОЛНИТЕ ФОРМУ</span> И МЫ ВАМ<br>ОБЯЗАТЕЛЬНО ПЕРЕЗВОНИМ</p>
				 <form class="s_form" action="index1.php" method="POST">          
				  <input class="s_text nameinp sinp" type="text" name="name" placeholder="Введите ваше имя*">          
				  <input class="s_text phoneinp sinp" type="text" name="phone" placeholder="Введите ваш телефон*">
				  <input type="hidden"  name="email" class="email" value="none@none.ru">
				  <input type="hidden"  name="adress" class="email" value="none">          
				  <input type="hidden" value="C" name="button">
				  <input type="hidden"  name="comment" value="None">
				  <input class="s_submit" type="button" value="ОТПРАВИТЬ">
				</form>
				</div>       
			  </div>

			<a href="#x" class="overlay-x2" id="tx-x2"></a>  
			  <div class="popup-x2">
						<div class="wind-x2">

			  </div>
			  </div>
		</div>
		  <div class="rel-pos">
		  <div class="header">    
			<div class="header-top">
			  <img class="header-pointer" alt="" src="/parts/img/pointer.png" >
			  <p>ПРОДАЖА<br>КАЧЕСТВЕННЫХ <span class="bold">ЗАПЧАСТЕЙ В ЧЕЛЯБИНСКОЙ ОБЛАСТИ</span><br>К ПРИЦЕПАМ, ПОЛУПРИЦЕПАМ И ТРАЛАМ <span class="bold">ЧМЗАП, СЗАП, НЕФАЗ, БЕЦЕМА, МАЗ</span></p>
			  <div class="header-telephone">
				  <p>
					  <span>ЗВОНОК БЕСПЛАТНЫЙ</span><br>
					  <img alt="" src="/parts/img/telephone.png" ><span class="number">8 351-903-00-40</span><br>
					  <a href="#wind-zakaz-top">ЗАКАЗАТЬ ЗВОНОК</a>
				  </p>
			  </div>
			</div>
			<div class="header-bottom">   
			  <h1>ЛЮБЫЕ ЗАПЧАСТИ <span class="bold">ДЛЯ</span><br /><span class="bold">ПРИЦЕПОВ И ПОЛУПРИЦЕПОВ НЕФАЗ, МАЗ, СЗАП, ЧМЗАП</span></h1>
			  <div class="tral"></div>
			  <div class="volvo"></div>
			</div>
		  </div>
		  <div class="asphalt">
		  <div class="center-980">
			<!-- ФОРМА ФОРМА ФОРМА -->
			<div class="my-form">      
			  <p><span class="bold">ЗАПОЛНИТЕ<br>ФОРМУ</span> И МЫ<span class="bold"> <span class="cool-red">ВАМ ПЕРЕЗВОНИМ</span></span></p>
			  <div class="feedback">                
				<form class="s_form" action="index1.php" method="POST">          
				  <input class="s_text nameinp sinp" type="text" name="name" placeholder="Введите ваше имя">          
				  <input class="s_text phoneinp sinp" type="text" name="phone" placeholder="Введите ваш телефон">
				  <input type="hidden"  name="email" class="email" value="none@none.ru">
				  <input type="hidden"  name="adress" class="email" value="none">          
				  <input type="hidden" value="C" name="button">
				  <input type="hidden"  name="comment" value="None">
				  <input class="s_submit" type="button" value="Заказать">
				</form>        
				</div>
			</div>  
			<div>
			<div class="guarntie-block">
			  <img alt="" src="/parts/img/guar1.png" ><br>
			  <p>ГАРАНТИЯ<br>КАЧЕСТВА</p>
			</div>
			<div class="guarntie-block">
					<img alt="" src="/parts/img/guar2.png" ><br>
			  <p>БЕЗОПАСНАЯ<br>ПОКУПКА</p>
			</div>
			<div class="guarntie-block">
					<img alt="" src="/parts/img/guar3.png"><br>
			  <p style="font-size: 18px;padding-top: 10px;">ГАРАНТИЯ ВОЗВРАТА ДЕНЕГ<br>ЕСЛИ ЗАПЧАСТЬ<br>НЕ ПОДОЙДЁТ</p>
			</div>
			</div>    
			<p class="zaholovok"><span class="bold">НАШИ АВТОЗАПЧАСТИ</span> НУЖНЫ ВАМ</p>    
			<div class="you-need-segway">
			  <p><img alt="" src="/parts/img/you-need-segway1.png">ДЛЯ ПОДДЕРЖАНИЯ СОСТОЯНИЯ СВОЕГО АВТОМОБИЛЯ</p>
			  <p><img alt="" src="/parts/img/you-need-segway2.png">ДЛЯ РЕМОНТА</p>
			  <p><img alt="" src="/parts/img/you-need-segway3.png">ДЛЯ УДАЛЕНИЯ ДЕФФЕКТОВ АВТОКАТОСТРОФ</p>
			  <p><img alt="" src="/parts/img/you-need-segway4.png">ДЛЯ ПОВЫШЕНИЯ БЕЗОПАСТНОСТИ</p>
			  <p><img alt="" src="/parts/img/you-need-segway5.png">ДЛЯ ЗАМЕНЫ</p>
			</div>
			<div>
			<div class="problems">
			  <p><span class="bold">ПРОБЛЕМЫ</span> С КОТОРЫМИ<br>СТАЛКИВАЮТСЯ 90%<br>ПОКУПАТЕЛЕЙ</p>
			</div>
			<div class="problems">
			  <p>ПОЧЕМУ<br><span class="bold">СТОИТ КУПИТЬ</span> У НАС</p>
			</div>
			</div>
			<div class="no">
			  <p><img alt="" src="/parts/img/no.png">ПОДДЕЛКА</p>
			  <p><img alt="" src="/parts/img/no.png">ОБМАН</p>
			  <p><img alt="" src="/parts/img/no.png">ДЛИТЕЛЬНЫЕ СРОКИ ДОСТАВКИ</p>
			  <p><img alt="" src="/parts/img/no.png">ПОТЕРЯ ТОВАРА</p>
			  <p><img alt="" src="/parts/img/no.png">ОТСТУТСТВИЕ ГАРАНТИИ НА ТОВАР</p>
			</div>
			<div class="yes">
			  <p><img alt="" src="/parts/img/yes.png">ГАРАНТИЯ КАЧЕСТВА</p>
			  <p><img alt="" src="/parts/img/yes.png">ТЕХНИЧЕСКАЯ ГАРАНТИЯ</p>
			  <p><img alt="" src="/parts/img/yes.png">БЕСПЛАТНАЯ ДОСТАВКА ПО РОССИИ</p>
			  <p><img alt="" src="/parts/img/yes.png">СКИДКИ</p>
			  <p><img alt="" src="/parts/img/yes.png">ВЫГОДНЫЕ УСЛОВИЯ</p>
			</div>
			<div class="my-form">      
			  <p><span class="bold">ЗАПОЛНИТЕ<br>ФОРМУ</span> И ОЖИДАЙТЕ <span class="bold"><span class="cool-red">ЗВОНКА</span></span></p>
			  <div class="feedback">
				<form class="s_form" action="index1.php" method="POST">          
				  <input class="s_text nameinp sinp" type="text" name="name" placeholder="Введите ваше имя">          
				  <input class="s_text phoneinp sinp" type="text" name="phone" placeholder="Введите ваш телефон">
				  <input type="hidden"  name="email" class="email" value="none@none.ru">
				  <input type="hidden"  name="adress" class="email" value="none">          
				  <input type="hidden" value="C" name="button">
				  <input type="hidden"  name="comment" value="None">
				  <input class="s_submit" type="button" value="Отправить">
				</form>        
			  </div>
			</div>
			
			<?= $content ?>
			
				 <!-- ФОРМА ФОРМА ФОРМА -->
			<div class="my-form">      
			  <p><span class="bold">ЗАКАЖИТЕ ЗВОНОК<br></span> И ПОЛУЧИТЕ <span class="bold"><span class="cool-red">СКИДКУ</span></span></p>
			  <div class="feedback">                
				<form class="s_form" action="index1.php" method="POST">          
				  <input class="s_text nameinp sinp" type="text" name="name" placeholder="Введите ваше имя">          
				  <input class="s_text phoneinp sinp" type="text" name="phone" placeholder="Введите ваш телефон">
				  <input type="hidden"  name="email" class="email" value="none@none.ru">
				  <input type="hidden"  name="adress" class="email" value="none">          
				  <input type="hidden" value="C" name="button">
				  <input type="hidden"  name="comment" value="None">
				  <input class="s_submit" type="button" value="Отправить">
				</form>        
			  </div>
			</div>
		  </div>

		  <div class="center-980">
			<div class="reviws-bg">
			  <div class="reviws">
				<p class="zaholovok"><span class="bold">ОТЗЫВЫ НАШИХ КЛИЕНТОВ</span></p>
				<div id="container">
			<pre><div id="slides">
		 <div>
			<img src="/parts/img/reviw-bg.png" alt="">
		 </div>
		 <div>
			<img src="/parts/img/reviw-bg1.png" alt="">
		 </div>

		 <div>
			<img src="/parts/img/reviw-bg2.png" alt="">
		 </div>
		</div></pre>
		  </div> 
			</div>
			<div class="how-wie-work">
			  <h1>КАК МЫ РАБОТАЕМ</h1>
			  <ul>
				<li><img src="/parts/img/work/1.png"><br>1.Звоните или оставляете нам бесплатную заявку</li>
				<li><img src="/parts/img/work/2.png"><br>2.Мы высылаем вам прайс-лист</li>
				<li><img src="/parts/img/work/3.png"><br>3.Выбираете себе запчасти</li>
				<li><img src="/parts/img/work/4.png"><br>4.Расчитываем стоимость</li>
				<li><img src="/parts/img/work/5.png"><br>5.На следующий день высылаем Вам запчасти</li>
			</div>  
			<div class="partners">  
			<h1>С КЕМ МЫ РАБОТАЕМ</h1>    
			  <img style="border-radius: 10px;"src="/parts/img/partners.png">
			</div>

			<br>
			<br>
					 <!-- ФОРМА ФОРМА ФОРМА -->
			<div class="my-form">      
			  <p><span class="bold">ЗАПОЛНИТЕ<br>ФОРМУ</span> И МЫ <span class="bold"><span class="cool-red">ВАМ ПЕРЕЗВОНИМ</span></span></p>
			  <div class="feedback">                
				<form class="s_form" action="index1.php" method="POST">          
				  <input class="s_text nameinp sinp" type="text" name="name" placeholder="Введите ваше имя">          
				  <input class="s_text phoneinp sinp" type="text" name="phone" placeholder="Введите ваш телефон">
				  <input type="hidden"  name="email" class="email" value="none@none.ru">
				  <input type="hidden"  name="adress" class="email" value="">        
				  <input type="hidden" value="C" name="button">
				  <input type="hidden"  name="comment" value="None">
				  <input class="s_submit" type="button" value="узнать">
				</form>        
			  </div>
			</div>
			<p class="last-p" style="font-size: 25px;"><span class="bold"><span style="color: #ec4f52;">ОПТОВИКАМ БЕСПЛАТНАЯ ДОСТАВКА</span> МОСКВЕ</span><br>
		ТЕЛЕФОН 8 800 <span class="bold">000 00 00</span></p>
		   </div> 
		   </div>
		<div class="footer">
			  <img class="header-pointer" alt="" src="/parts/img/pointer.png" >
			  <p>ПРОДАЖА<br>КАЧЕСТВЕННЫХ <span class="bold">АВТОЗАПЧАСТЕЙ на VOLVO</span><br><span class="bold">ОПТОВИКАМ ДОСТАВКА ПО МОСКВЕ</span> БЕСПЛАТНО</p>

			  <div class="header-telephone"><p><span>ЗВОНОК БЕСПЛАТНЫЙ</span><br><img alt="" src="/parts/img/telephone.png"><span class="number">8 800 000 00 00</span><br><a href="#wind-zakaz-bot">ЗАКАЗАТЬ ЗВОНОК</a></p></div>      
			  <p class="copyright">&copy; 2014-<?=date('Y')?> Все права защищены</p>
			  <a href="#x" class="overlay-zvonokb" id="wind-zakaz-bot"></a>  
			  <div class="popup-zvonokb">
				<div class="wind-zakaz-bot">
				  <p><span class="bold">ЗАПОЛНИТЕ ФОРМУ</span> И МЫ ВАМ<br>ОБЯЗАТЕЛЬНО ПЕРЕЗВОНИМ</p>
				 <form class="s_form" action="index1.php" method="POST">          
				  <input class="s_text nameinp sinp" type="text" name="name" placeholder="Введите ваше имя*">          
				  <input class="s_text phoneinp sinp" type="text" name="phone" placeholder="Введите ваш телефон*">
				  <input type="hidden"  name="email" class="email" value="none@none.ru">
				  <input type="hidden"  name="adress" class="email" value="none">          
				  <input type="hidden" value="C" name="button">
				  <input type="hidden"  name="comment" value="None">
				  <input class="s_submit" type="button" value="ОТПРАВИТЬ">
				</form>
				</div>       
			  </div>
			</div>
			<div class="fixed-button">
			  <a href="#wind-zakaz-fixed">ЗАКАЗАТЬ ЗВОНОК</a>
			</div>
		  </div>
        <?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>