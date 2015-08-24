<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(Category::getList()) ?>

	<?=	\common\modules\attachments\components\AttachmentsInput::widget([
		'id' => 'file-input', // Optional
		'model' => $model,
		'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget
			'maxFileCount' => 50 // Client max files
		],
		'options' => [] // Options of the Kartik's FileInput widget
	]) ?>

	<?php /*<?= $form->field($model, 'logo')->fileInput() ?>*/ ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
			'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
			'onclick' => "$('#file-input').fileinput('upload');"
		])
		?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
