<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

	<?=	\common\modules\attachments\components\AttachmentsInput::widget([
		'id' => 'file-input', // Optional
		'model' => $model,
		'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget
			'maxFileCount' => 50 // Client max files
		],
		'options' => [] // Options of the Kartik's FileInput widget
	]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'embed')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(Category::getList()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
			'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
			'onclick' => "$('#file-input').fileinput('upload');"
		])
		?>
    </div>

    <?php ActiveForm::end(); ?>

</div>