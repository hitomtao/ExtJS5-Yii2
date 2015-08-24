<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $keywords

 */
class Seo extends \common\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt_create', 'dt_update', 'id_user_create', 'id_user_update','url', 'title', 'description', 'keywords'], 'required'],
            [['id_user_create', 'id_user_update', 'removed', 'enabled'], 'integer'],
            [['dt_create', 'dt_update'], 'safe'],
            [['title',], 'string', 'max' => 255],
            [['url', 'description', 'keywords'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            

        ];
    }

    public static function Settings() {
		$section = Yii::$app->db->cache(function () {
			return self::find()->where([])->all();
		}, 3600);
		return $section[0];
	}   
}
