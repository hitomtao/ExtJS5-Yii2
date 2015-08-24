
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<p class="fontClass20"><?=$enterprise->city?>, <?=$enterprise->street?>, <?=$enterprise->house?></p>
		<p class="fontClass20">Телефон: <?=$enterprise->phone?></p>
		<span class="fontClass20">e-mail: </span><span class="fontClass33"><?=$enterprise->email?></span>
		<br/>
		<button type="button" class="btn btn-default btn-sm fontClass11 setMarginTop30px setMarginBottom30px getReviewsButtonHover hidden-sm hidden-md hidden-lg visible-xs-block">Отзывы о нас</button>
		</div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <h3 class="fontClass20 setUpperCase setMarginTopZero">расписание квестов</h3>
            <p class="fontClass17">Выберите день для собственного приключения.
			Найдите удобное время для квеста и забронируйте на сайте прямо сейчас. 
			</p>
			<button type="button" class="btn btn-default btn-sm fontClass12 setMarginTop30px ReservationButton getReservationButtonHover hidden-sm hidden-md hidden-lg visible-xs-block">Забронировать</button>
        </div>
	</div>	
	<div class="row visible-sm-block visible-md-block visible-lg-block hidden-xs">	
		<div class="col-sm-6 col-md-6 col-lg-6">
		<button type="button" class="btn btn-default btn-sm fontClass11 setMarginTop10px getReviewsButtonHover">Отзывы о нас</button>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
		<button type="button" class="btn btn-default btn-sm fontClass12 setMarginTop10px ReservationButton getReservationButtonHover">Забронировать</button>
		</div>
	</div>	
    <div class="row">
            <div id="map" class="col-xs-12 col-md-12 col-sm-12 col-lg-12">

		
		</div>
    </div>
   
</div>
<script type="text/javascript">
     ymaps.ready(init);
        var myMap, 
            myPlacemark;

        function init(){ 
            myMap = new ymaps.Map("", {
                center: [<?=$enterprise->MapY?>, <?=$enterprise->MapX?>],
                zoom: 15
            });
            myMap.controls.add(
                new ymaps.control.ZoomControl()
            );
            
            myPlacemark = new ymaps.Placemark([<?=$enterprise->MapY?>, <?=$enterprise->MapX?>], {
                hintContent: '<?=$enterprise->street?>, <?=$enterprise->house?>'
               
            });
            
            myMap.geoObjects.add(myPlacemark);
        }
</script>
