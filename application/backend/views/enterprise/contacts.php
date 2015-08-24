<?php
    /**
     * один элемент ячейки
     */
	/* @var $contacts \common\models\Enterprise */
    
?>
<?=$contacts->city?>, <?=$contacts->street?>, <?=$contacts->house?><br/>
<span>телефон: </span><?=$contacts->phone?><br/>
<span>e-mail: </span><?=$contacts->email?>
<script type="text/javascript">
    
    
    ymaps.ready(init);
        var myMap, 
            myPlacemark;

        function init(){ 
            myMap = new ymaps.Map("map", {
                center: [<?=$contacts->MapY?>, <?=$contacts->MapX?>],
                zoom: 15
            });
            myMap.controls.add(
                new ymaps.control.ZoomControl()
            );
            
            myPlacemark = new ymaps.Placemark([<?=$contacts->MapY?>, <?=$contacts->MapX?>], {
                hintContent: '<?=$contacts->street?>, <?=$contacts->house?>'
               
            });
            
            myMap.geoObjects.add(myPlacemark);
        }
    
    
    
    
    
    
</script>

<div id="map" style="width: 745px; height: 300px"></div>



