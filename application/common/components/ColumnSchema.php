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
class ColumnSchema extends \yii\grid\Column {
	public $header = 'Схема';

	protected function renderDataCellContent($model, $key, $index)
    {
        /* @var $model \common\models\Part */
		if($model->getSchemaUrl()){
			return Html::a($model->getSchemaThumbr(),
					$model->getSchemaUrl(), [
						'rel' => "prettyPhoto[gal]",
						'title' => "Kit code: " . $model->kit_code . ", Схема, Механика 74, " . $model->name,
					]
			);
		}
		return null;
    }
}
