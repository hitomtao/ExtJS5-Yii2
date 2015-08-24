<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информация о компании';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="enterprise-index">



    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'dt_create',
            //'dt_update',
            //'id_user_create',
            //'id_user_update',
            // 'removed',
            // 'enabled',
            // 'name',
            'city',
            'street',
            'house',
            'phone',
            'email',
            // 'map',
            //'partnership',
            //'about',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
