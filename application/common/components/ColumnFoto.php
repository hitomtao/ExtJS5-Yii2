<?php
namespace common\components;

use Yii;
use Closure;
use yii\helpers\Html;
use yii\helpers\Url;
/**
 * Description of Imager
 *
 * @author Ultra
 */
class ColumnFoto extends \yii\grid\Column {
	public $header = 'Фото';

	protected function renderDataCellContent($model, $key, $index)
    {
		/* @var $model \common\models\Part */
		if($model->getFotoUrl()){
			return Html::a($model->getFotoThumbr(),
					$model->getFotoUrl(), [
						'rel' => "prettyPhoto[gal]",
						'title' => "Kit code: " . $model->kit_code . ", Фото, Механика 74, " . $model->name,
					]
			);
		}
		return null;
    }
}
