<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Enterprise */


$this->params['breadcrumbs'][] = ['label' => 'Компания', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'dt_create',
            //'dt_update',
            //'id_user_create',
            //'id_user_update',
            //'removed',
            //'enabled',
            //'name',
            'city',
            'street',
            'house',
            'phone',
            'email:email',
            //'map',
            //'partnership:ntext',
            //'about:ntext',
        ],
    ]) ?>

</div>
