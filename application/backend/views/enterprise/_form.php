
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use vova07\imperavi\Widget as Wisiwig;
/* @var $this yii\web\View */
/* @var $model common\models\Enterprise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enterprise-form">
    
   
    
   
    
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    <?= Html::activeHiddenInput($model, 'MapX', $options=[ 'value' => '']); ?>
    <?= Html::activeHiddenInput($model, 'MapY', $options=[ 'value' => '']); ?>
    <?= Html::activeHiddenInput($model, 'zoom', $options=[ 'value' => '']); ?>
    
       

    <?= $form->field($model, 'city')->textInput(array('maxlength' => 255, 'onchange'=>'setCoords()')) ?>

    <?= $form->field($model, 'street')->textInput(array('maxlength' => 255, 'onchange'=>'setCoords()')) ?>

    <?= $form->field($model, 'house')->textInput(array('maxlength' => 255, 'onchange'=>'setCoords()')) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
	
	<?= $form->field($model, 'facebook')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'twitter')->textInput(['maxlength' => 255]) ?>
	
	<?= $form->field($model, 'vkontakte')->textInput(['maxlength' => 255]) ?>
	
	<?= $form->field($model, 'google')->textInput(['maxlength' => 255]) ?>
   
    <?= $form->field($model, 'site_motto')->textInput(['maxlength' => 1000]) ?>
	
	<?= $form->field($model, 'partnership')->widget(Wisiwig::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen'
        ]
    ]
]);
            
            
            ?>

    <?= $form->field($model, 'about')->widget(Wisiwig::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen'
        ]
    ]
]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div id="YMapsID" style="width:0px;height:0px"></div>
<script type="text/javascript">
function setCoords() {
        console.log('enter');
       
        var city_obj = $('#enterprise-city');
        var street_obj = $('#enterprise-street');
        var house_obj = $('#enterprise-house');
        var address;
       
        if (city_obj.val().length > 0) {
            address = ", " + city_obj.val();
        }
        if (street_obj.val().length > 0) {
            address += ", " + street_obj.val();
        }
        if (house_obj.val().length > 0) {
            address += ", " + house_obj.val();
        }
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID")[0]);
        var geocoder = new YMaps.Geocoder(address, {
            results: 1,
            boundedBy: map.getBounds()
        });
        YMaps.Events.observe(geocoder, geocoder.Events.Load, function() {
            if (this.length()) {
                placemark = this.get(0);
                console.log(placemark);
                map.addOverlay(placemark);
                map.setBounds(placemark.getBounds());
                var point = placemark.getGeoPoint();
                //getY - latitude
                //getX - longitude
                $('#enterprise-mapx').val(point.getX());
                $('#enterprise-mapy').val(point.getY());
                $('#enterprise-zoom').val(13);
                console.log(address);
                console.log('map x = ' + point.getX());
                console.log('map y = ' +point.getY());
            }
        });
        // Процесс геокодирования завершен неудачно
        YMaps.Events.observe(geocoder, geocoder.Events.Fault, function(geocoder, error) {});
    };
</script>