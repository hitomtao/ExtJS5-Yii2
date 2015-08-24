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

<div class="full_page_photo">
     <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d145905.54920852953!2d61.40857055000001!3d55.15222985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c592cb104a3a8d%3A0xef224a2a6d1711bf!2z0KfQtdC70Y_QsdC40L3RgdC6LCDQp9C10LvRj9Cx0LjQvdGB0LrQsNGPINC-0LHQuy4sINCg0L7RgdGB0LjRjw!5e0!3m2!1sru!2sus!4v1424883432272"></iframe>
</div>

<div id="main">
     <div class="container">
          <section id="contact">
               <div class="hgroup">
                    <h1>Связь с нами</h1>
                    <h2>Если у вас есть вопросы и предложения или вам нужна информация о нашей копании, вы можете легко связаться с нами.</h2>
                    <ul class="breadcrumb pull-right">
                         <li><a href="/">На главную</a> <span class="divider">/</span></li>
                         <li class="active">Контакты</li>
                    </ul>
               </div>
               <div class="row">
                    <div class="span4 office_address">
                         <address>
							<strong>Механика 74</strong><br />
							Челябинск, ул. Линейная, 96Б<br />
							<abbr title="Телефон">Тел:</abbr> +7 (351) 903-00-40
                         </address>
                         <address>
							<strong>Наш почтовый ящик</strong><br />
							<a href="mailto:3519030040@mail.ru">3519030040@mail.ru</a>
                         </address>
                    </div>
                    <div class="span8 contact_form">
                         <form />
                              <div class="row">
                                   <div class="span4">
                                        <label>Ваше имя</label>
                                        <input type="text" class="span4" />
                                   </div>
                                   <div class="span4">
                                        <label>E-mail</label>
                                        <input type="text" class="span4" />
                                   </div>
                                   <div class="span8">
                                        <label>Тема сообщения</label>
                                        <input type="text" class="span8" />
                                   </div>
                                   <div class="span8">
                                        <label>Текст сообщения</label>
                                        <textarea rows="8" class="span8"></textarea>
                                   </div>
                                   <div class="span8"> <a class="btn btn-large btn-success"><span>Отправить</span></a> </div>
                              </div>
                         </form>
                    </div>
               </div>
          </section>
          <!--END Contact-->
     </div>
    <?= $this->render('/layouts/main_footer') ?>
</div>