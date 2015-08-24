<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;
use vova07\fileapi\Widget as FileAPI;

/* @var $this yii\web\View */
/* @var $model common\models\Part */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="part-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', [
			'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
			'onclick' => "$('#file-input').fileinput('upload');"
		])
		?>
    </div>

    <?= $form->field($model, 'category_id')->dropDownList(Category::getList()) ?>
	
	<?php
		echo $form->field($model, 'file_schema')->widget(
			FileAPI::className(),
			[
				'settings' => [
					'url' => ['/part/fileapi-upload']
				]
			]
		);
	?>
	
	<?php
		echo $form->field($model, 'file_foto')->widget(
			FileAPI::className(),
			[
				'settings' => [
					'url' => ['/part/fileapi-upload']
				]
			]
		);
	?>

	<?php /*<?= $form->field($model, 'logo')->fileInput() ?>*/ ?>

	<?= $form->field($model, 'kit_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

	<?= $form->field($model, 'price')->textInput(['maxlength' => 255]) ?>

	<?= $form->field($model, 'delivery_time')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'id_in_schema')->textInput(['maxlength' => 255]) ?>
	
	<?= $form->field($model, 'nomenklature_number')->textInput(['maxlength' => 255]) ?>
	
	<?= $form->field($model, 'number_per_axis')->textInput(['maxlength' => 255]) ?>
	
	<?= $form->field($model, 'applicability')->textInput(['maxlength' => 1000]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', [
			'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
//			'onclick' => "$('#file-input').fileinput('upload');"
		])
		?>
    </div>
    <?php ActiveForm::end(); ?>
</div>