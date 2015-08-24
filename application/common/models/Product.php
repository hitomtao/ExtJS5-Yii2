<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 *
 * @property Category $category
 * @property File[] $attacedFiles Прикрепленные файлы
 * @property File[] $photos Foto
 * @property-read File $logo Logo
 */
class Product extends Base
{

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
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
            [['name'], 'string', 'max' => 255],
            [['short_description'], 'string', 'max' => 1000],
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


}
