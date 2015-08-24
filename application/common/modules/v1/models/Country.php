<?php
namespace common\modules\v1\models;

use \yii\db\ActiveRecord;
/**
 * Country Model
 *
 * @author Ivan Skripov <skripov.in@gmail.com>
 */
class Country extends ActiveRecord 
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'country';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['code'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required']
        ];
    }   
}
