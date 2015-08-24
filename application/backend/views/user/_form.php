<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => 255]) ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

	<div class="form-group field-user-newpassword">
		<label class="control-label" for="user-newpassword">Пароль</label>
		<input type="text" id="user-newpassword" class="form-control" name="User[newpassword]" value="" maxlength="255">
		<div class="help-block"></div>
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
