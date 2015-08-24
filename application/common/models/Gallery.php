<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $dt_create
 * @property string $dt_update
 * @property integer $id_user_create
 * @property integer $id_user_update
 * @property string $title
 * @property string $img_small
 * @property string $img_large
 * @property string $caption
 *
 * @property UserNormal $idUserCreate
 * @property UserNormal $idUserUpdate
 */
class Gallery extends \common\models\Base
{
	public $img_small0upload;

    public $img_large0upload;

	

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt_create', 'dt_update', 'id_user_create', 'id_user_update', 'name', 'comment', 'title', 'img_large0upload', 'caption'], 'required', 'on'=>'create'],
			[['dt_create', 'dt_update', 'id_user_create', 'id_user_update', 'name', 'comment',  'title', 'caption'], 'required', 'on'=>'update'],
            [['dt_create', 'dt_update'], 'safe'],
            [['id_user_create', 'id_user_update'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['img_small', 'img_large', 'img_small_dim', 'img_large_dim'], 'string', 'max' => 255],
            [['caption'], 'string', 'max' => 500],
			[['img_large0upload'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt_create' => 'Dt Create',
            'dt_update' => 'Dt Update',
            'id_user_create' => 'Id User Create',
            'id_user_update' => 'Id User Update',
            'name' => 'Имя посетителя',
            'title' => 'Заголовок',
            'img_small' => 'Img Small',
            'img_large' => 'Img Large',
            'caption' => 'Отзыв',
            'comment' => 'Комментарий',
            
            'img_large0upload' => 'Фотография посетителя'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUserCreate()
    {
        return $this->hasOne(UserNormal::className(), ['id' => 'id_user_create']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUserUpdate()
    {
        return $this->hasOne(UserNormal::className(), ['id' => 'id_user_update']);
    }
	
	public static function getAllImages()
		{
			$gallery = Yii::$app->db->cache(function () {
              return Gallery::find()->all();
			}, 1);
			return $gallery;
		}	
	
}
