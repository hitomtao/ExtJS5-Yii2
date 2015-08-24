<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $parent_id
 *
 * @property Product[] $products
 * @property Part[] $parts
 * @property-read File $logo Logo
 */
class Category extends Base
{
    const TECHNICS_ID = 2;
	const PARTS_ID = 3;


	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_id'], 'required'],
            [['description'], 'string'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['embed'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

	/**
     * @return \yii\db\ActiveQuery
     */
    public function getParts()
    {
        return $this->hasMany(Part::className(), ['category_id' => 'id']);
    }

	public static function getList() {
        $data = self::find()->all();
        if($data === null){
                throw new HttpException(404, "Ошибка");
        }
        return [0=>'Основной раздел'] + \yii\helpers\BaseArrayHelper::map($data, 'id', 'name');
    }

	public static function getMain() {
		return static::findOne(['id'=>'1']);
	}

	/**
	 * резделы главных категорий (TECHNICS_ID or PARTS_ID
	 * @param int $id ID раздела
	 * @return Category[]
	 */
	public static function getPartions($id) {
		return static::find()->where(['parent_id'=>$id])->all();
	}

	/**
	 * Все категории первого уровня
	 * @param int $id_partion ID родительского раздела
	 * @return Category[]
	 */
	public static function getFirstLevel($id_partion) {
		$categories = static::find();
		foreach(static::getPartions($id_partion) as $parent){
			$categories->orWhere('parent_id = '.$parent->id);
		}
		return $categories->all();
	}




}
