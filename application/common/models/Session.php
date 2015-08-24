<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "session".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $token
 * @property integer $expired

 */
class Session extends ActiveRecord
{
    static $EXPIRED = 3600;


	/**
     * @inheritdoc
     */
    public static function tableName()
    {
		return '{{%session}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'token', 'expired'], 'required'],
            [['user_id', 'expired'], 'integer'],
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
	
	/**
	 * Создать новый временный токен
	 * @param type $user_id
	 * @return boolean|Session
	 */
	public function createToken($user_id) {
		$this->user_id = $user_id;
		$this->expired = self::$EXPIRED;
		$this->token = Yii::$app->getSecurity()->generateRandomString();
		if($this->save()){
			return $this;
		}
		return false;
	}
 
}
