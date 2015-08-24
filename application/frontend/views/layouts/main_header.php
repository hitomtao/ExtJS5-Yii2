<?php
	use common\components\Navic;
?>

<header>
	<div class="container">
		<div class="navbar">
			<div class="navbar-inner">
				<a class="brand" href="/">
					<img src="/images/logo.png" width="90" height="90" alt="Механика 74" />
					<span class="logo_title"></span>
					<span class="logo_subtitle">Многофункциональный центр предприятий</span>
				</a>
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="nb_left pull-left">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</span>
					<span class="nb_right pull-right">menu</span>
				</a>
				<div class="nav-collapse collapse">
					<?php
						$menuItems[] = [
							'label' => 'Главная',
							'url' => ['/site/index'],
						];

						$menuItems[] = [
							'label' => 'О нас',
							'url' => ['/site/about'],
							'active'=>yii::$app->controller->action->id == 'about' || yii::$app->controller->action->id == 'ustav'
						];

						$menuItems[] = [
							'label' => 'Каталог техники',
							'url' => ['/catalog'],
							'active'=>yii::$app->controller->action->id == 'product' || (yii::$app->controller->action->id == 'category' && yii::$app->controller->action->controller->id == 'site') || yii::$app->controller->action->id == 'catalog'
						];

						$menuItems[] = [
							'label' => 'Запчасти',
							'url' => ['/part/index'],
							'active'=>yii::$app->controller->id == 'part'
						];

						$menuItems[] = [
							'label' => 'ПРОМО',
							'url' => ['/part/promo'],
						];

						$menuItems[] = [
							'label' => 'Партнеры',
							'url' => ['/site/partners'],
						];

						$menuItems[] = [
							'label' => 'Контакты',
							'url' => ['/site/contacts'],
						];

						echo Navic::widget([
							'options' => [
								'class' => 'nav pull-right'
							],
							'items' => $menuItems,
							'id' => false,
						]);
					?>
				</div>
			</div>
		</div>
		<div id="social_media_wrapper">
			<a target="_blank" title="Наш магазин на avito" href="https://www.avito.ru/mexanika74"></a>
		</div>
		<div id="sign"><a href="register.html"><i class="icon icon-user"></i>Register/Sign in</a></div>
	</div>
</header>