<?php
	use yii\helpers\Html;
	use common\models\Part;
	/* @var $parts Part[] */
	
?>

<p class="zaholovok">ЧТО МЫ<br><span class="bold">ПРЕДЛАГАЕМ</span></p>
<div class="aksesuar-wrapper">
	<?php foreach($parts as $part): ?>
		<div class="aksesuar id_<?=$part->id?>">
			<?=Html::a($part->getFotoThumbr(200, 200), ['part/category', 'id'=>$part->category_id])?>
			<p><?=Html::a($part->name, ['part/category', 'id'=>$part->category_id])?></p>      
			<p class="cena"><?=$part->price?> €</p>
		</div>
	<?php endforeach; ?>
</div>