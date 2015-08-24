<?php

namespace common\models;

use Yii;
use yii\web\NotFoundHttpException;
use common\modules\attachments\models\File;

/**
 * Мой общий класс для моделей c некоторыми повторяющимися методами
 *
 * @author Skripov.in <skripov.in@gmail.com>
 * @property-read File[] $attachedFiles Файлы
 * @property-read Time[] $allTimes Все временные отрезки
 * @property-read Day[] $allDays Все дни недели
 */
class Base extends \yii\db\ActiveRecord {
    const LOGO = 'logo';

	public function behaviors()
	{
		return [
			'fileBehavior' => [
				'class' => \common\modules\attachments\behaviors\FileBehavior::className()
			]
		];
	}

	/**
	 * TODO закешировать
     * @return \yii\db\ActiveQuery
     */
	public function getAttachedFiles() {
		return $this->hasMany(File::className(), ['itemId' => 'id'])->
				andWhere(['model'=>\yii\helpers\StringHelper::basename(get_class($this))]);
	}

	/**
	 *
	 * @return File[]
	 */
	public function getPhotos() {
		$files = $this->attachedFiles;
		if($files!==null){
			$ret = [];
			foreach($files as $file){
				if(!mb_stristr(self::LOGO, $file->name) && $file->type != 'pdf'){
					$ret[] = $file;
				}
			}
			return $ret;
		}
		return false;
	}

	/**
	 *
	 * @return string url
	 */
	public function getLogo() {
		$files = $this->attachedFiles;
		if($files!==null){
			foreach($files as $file){
				if(mb_stristr(self::LOGO, $file->name)){
					return $file->url;
				}
			}
		}
		return false;
	}

	/**
	 * Получить url картинки-схемы (для запчастей)
	 */
	public function getPartSchema() {
		return $this->getAttachedFiles()->andWhere(['name'=>'s'])->one();
	}

	/**
	 * Получить url фотки (для запчастей)
	 */
	public function getPartFoto() {
		return $this->getAttachedFiles()->andWhere(['name'=>'f'])->one();
	}

}
