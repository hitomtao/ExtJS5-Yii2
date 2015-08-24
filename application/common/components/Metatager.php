<?php

namespace common\components;

use Yii;
use yii\base\Component;
use common\models\Seo;
use yii\helpers\Url;
/**
 * Description of Metatager
 * @property-read string $title Заголовок страницы
 * @property-read string $description Описание
 * @property-read string $лeywords Ключевые слова
 * @author Петя
 */
class Metatager extends Component {
	public $tags;

	public function init() {
		parent::init();
		$this->InitTags();
	}
	
	protected function InitTags() {
		//var_dump(Url::to(''));
		$this->tags = Seo::findOne(['url'=>Url::to('')]);
	}

	public function getTitle() {
		return isset($this->tags->title) ? $this->tags->title : null;
	}
	
	public function getDescription() {
		return isset($this->tags->description) ? $this->tags->description : null;
	}
	
	public function getKeywords() {
		return isset($this->tags->keywords) ? $this->tags->keywords : null;
	}
}