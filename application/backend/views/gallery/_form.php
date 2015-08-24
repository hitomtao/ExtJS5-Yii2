<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(['options'=> ['enctype' => 'multipart/form-data']]); ?>

    

    <?= $form->field($model, 'title')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'caption')->textArea(['maxlength' => 500]) ?>

    <?= $form->field($model, 'comment')->textArea(['maxlength' => 500]) ?>
	
	<!-- <div class="col-md-12 col-lg-12">
	 <?php $title = isset($model->img_small) && !empty($model->img_small) ? $model->img_small : 'small.gif';
	echo Html::img('/gallery/'.$title , [
    'class'=>'img-thumbnail', 
   
     ]);?>
	 <?= $form->field($model, 'img_small0upload')->fileInput() ?>
	</div> -->
	
	<div class="col-md-12 col-lg-12">
   	<?php $title = isset($model->img_large) && !empty($model->img_large) ? $model->img_large : 'customer.jpg';
	echo Html::img(Yii::getAlias("@uploads").'/'.$title , [
    'class'=>'img-thumbnail', 
    
     ]);?>
	<?= $form->field($model, 'img_large0upload')->fileInput() ?>
	</div>
	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
