<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Enterprise */

$this->title = 'Редактировать информацию о компании';
$this->params['breadcrumbs'][] = ['label' => 'Компания', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'IQ174', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enterprise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
