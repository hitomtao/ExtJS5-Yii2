<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use vova07\fileapi\behaviors\UploadBehavior;
use himiklab\thumbnail\EasyThumbnailImage;

/**
 * This is the model class for table "part".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property string $kit_code
 * @property string $price
 * @property string $delivery_time
 * @property string $file_schema
 * @property string $file_foto
 * @property string $applicability
 *
 * @property Category $category
 * @property File[] $attacedFiles Прикрепленные файлы
 * @property File[] $photos Foto
 * @property-read File $logo Logo
 */
class Part extends Base
{
	
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'part';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'kit_code', 'price', 'delivery_time', 'id_in_schema', 'nomenklature_number', 'number_per_axis'], 'string', 'max' => 255],
            [['short_description'], 'string', 'max' => 1000],
            [['applicability'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Название',
            'short_description' => 'Краткое описание',
            'description' => 'Полное описание',
			'logo' => 'Логотип (352х220)',
			'kit_code' => 'Kit code',
			'price' => 'Цена в евро',
			'delivery_time' => 'Срок поставки',
			'id_in_schema' => '№ На схеме',
			'nomenklature_number' => 'Номенклатурный номер',
			'number_per_axis' => 'Кол-во на 1 ось',
			'applicability' => 'Применяемость',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }



	public static function getList() {
        $data = self::find()->all();
        if($data === null){
                throw new HttpException(404, "Ошибка");
        }
        return \yii\helpers\BaseArrayHelper::map($data, 'id', 'name');
    }
	
	public function behaviors()
	{
		return [
			'uploadBehavior' => [
				'class' => UploadBehavior::className(),
				'attributes' => [
					'file_schema' => [
						'path' => "@frontend/web/uploads/file_schema",
						'tempPath' => '@frontend/web/uploads/tmp',
						'url' => '/part/file_schema/view'
					],
					'file_foto' => [
						'path' => "@frontend/web/uploads/file_foto",
						'tempPath' => '@frontend/web/uploads/tmp',
						'url' => '/part/file_schema/view'
					],
				]
			]
		];
	}
	
	public function getSchemaUrl() {
		if($this->file_schema) return "/uploads/file_schema/" . $this->file_schema;
		return null;
	}
	
	public function getSchemaThumbr($width=150, $height=100) {
		return EasyThumbnailImage::thumbnailImg($this->getSchemaAliasUrl(), $width, $height);
	}
	
	public function getSchemaAliasUrl() {
		if($this->file_schema) return "@frontend/web/uploads/file_schema/" . $this->file_schema;
		return null;
	}
	
	public function getFotoUrl() {
		if($this->file_foto) return "/uploads/file_foto/" . $this->file_foto;
		return null;
	}
	
	public function getFotoThumbr($width=150, $height=100) {
		return EasyThumbnailImage::thumbnailImg($this->getFotoAliasUrl(), $width, $height);
	}
	
	public function getFotoAliasUrl() {
		if($this->file_foto) return "@frontend/web/uploads/file_foto/" . $this->file_foto;
		return null;
	}

}
