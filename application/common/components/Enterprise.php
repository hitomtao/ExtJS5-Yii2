<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "enterprise".
 *
 * @property integer $id
 * @property string $dt_create
 * @property string $dt_update
 * @property integer $id_user_create
 * @property integer $id_user_update
 * @property integer $removed
 * @property integer $enabled
 * @property string $name
 * @property string $city
 * @property string $street
 * @property string $house
 * @property string $phone
 * @property string $email
 * @property string $map
 * @property string $mapX
 * @property string $mapY
 * @property string $zoom
 * @property string $partnership
 * @property string $about
 *
 * @property User $idUserCreate
 * @property User $idUserUpdate
 */
class Enterprise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enterprise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt_create', 'dt_update', 'id_user_create', 'id_user_update', 'street', 'house', 'phone', 'email', 'facebook', 'twitter', 'google', 'vkontakte', 'partnership', 'about'], 'required'],
            [['email'], 'email'],
            [['dt_create', 'dt_update'], 'safe'],
            [['id_user_create', 'id_user_update', 'removed', 'enabled'], 'integer'],
            [['partnership', 'about'], 'string'],
            [['name', 'city', 'street', 'house', 'phone', 'email', 'MapX', 'MapY', 'zoom', 'facebook', 'twitter', 'google', 'vkontakte'], 'string', 'max' => 255],
			[['site_motto'], 'string', 'max' => 1000]
			
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dt_create' => 'Дата создания',
            'dt_update' => 'Дата изменения',
            'id_user_create' => 'Кто создал',
            'id_user_update' => 'Последний редактирующий',
            'removed' => 'Удален',
            'enabled' => 'Включен',
            'name' => 'Название',
            'city' => 'Город',
            'street' => 'Улица',
            'house' => 'Дом',
            'phone' => 'Телефон',
            'email' => 'Email',
            'map' => 'Код для вставки карты',
            'partnership' => 'Сотрудничество',
            'about' => 'О компании',
			'facebook' => 'Facebook аккаунт',
			'twitter' => 'Twitter аккаунт',
			'google' => 'Google аккаунт',
			'vkontakte' => 'Аккаунт ВКонтакте',
			'site_motto' => 'Заголовок в шапке сайта'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUserCreate()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_create']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUserUpdate()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_update']);
    }
}
