<?php
use yii\helpers\Html;
use yii\helpers\Url;
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
		<html class="no-js lt-ie9 lt-ie8 lt-ie7" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="ru-RU" prefix="og: http://ogp.me/ns#" prefix="ya: https://webmaster.yandex.ru/vocabularies/">
	<![endif]-->
    <!--[if IE 7]>
		<html class="no-js lt-ie9 lt-ie8" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="ru-RU" prefix="og: http://ogp.me/ns#" prefix="ya: https://webmaster.yandex.ru/vocabularies/">
	<![endif]-->
    <!--[if IE 8]>
		<html class="no-js lt-ie9" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="ru-RU" prefix="og: http://ogp.me/ns#" prefix="ya: https://webmaster.yandex.ru/vocabularies/">
	<![endif]-->
    <!--[if gt IE 8]><!-->
		<html class="no-js" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" lang="ru-RU" prefix="og: http://ogp.me/ns#" prefix="ya: https://webmaster.yandex.ru/vocabularies/" prefix="og: http://ogp.me/ns# business: http://ogp.me/ns/business#">
		<!--<![endif]-->
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
		<title><?= Html::encode($this->title) ?></title>
		<?= Html::csrfMetaTags() ?>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,300italic' rel='stylesheet' type='text/css' />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="canonical" href="">
		<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <meta property="business:contact_data:street_address" content="<?=Enterprise::About()->street?>"/>
        <meta property="business:contact_data:locality" content="<?=Enterprise::About()->city?>"/>
        <meta property="business:contact_data:postal_code" content="454000"/>
        <meta property="business:contact_data:country_name" content="Россия"/>
        <meta property="business:contact_data:email" content="<?=Enterprise::About()->email?>"/>
        <meta property="business:contact_data:phone_number" content="<?=Enterprise::About()->phone?>"/>
        <meta property="business:contact_data:website" content="<?=Yii::$app->getUrlManager()->createAbsoluteUrl('')?>"/>
		<meta name="google-site-verification" content="_kITV-EJJB3x2ibRcK1BTviXU07KQm3MVhYR5xZuStU" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/apple-touch-icon-114x114-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/apple-touch-icon-72x72-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="/images/apple-touch-icon-57x57-precomposed.png" />
        <link rel="shortcut icon" href="favicon.png" />
        <?php $this->head() ?>
    </head>
    <body>
		<?php $this->beginBody() ?>
        <?= $this->render('main_header') ?>
        <?= $content ?>
		<?= $this->render('/layouts/counters') ?>
        <?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>