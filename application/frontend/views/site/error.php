<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<div id="main">
    <div class="container">
        <section class="call_to_action">
            <h3 class="animated bounceInDown"><strong>Ошибка...</strong></h3>
            <h4 class="animated bounceInUp"><?= Html::encode($this->title) ?></h4>
			<p><?= nl2br(Html::encode($message)) ?></p>
        </section>
    </div>
	<?= $this->render('/layouts/main_footer') ?>
</div>