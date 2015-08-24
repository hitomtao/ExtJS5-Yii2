<?php
/**
 * Общие scopes
 *
 * @author Skripov.in <skripov.in@gmail.com>
 */
namespace common\models;

use yii\db\ActiveQuery;

class RulesQuery extends ActiveQuery
{
    /**
	 * Не удаленные
	 * @return self
	 */
	public function active()
    {
        return $this->andWhere(['removed' => 0, 'enabled' => 1]);
    }
    /**
	 * Включенные
	 * @return self
	 */
	public function enabled()
    {
        return $this->andWhere(['enabled' => 1]);
    }
    /**
	 * Удаленные
	 * @return self
	 */
	public function removed()
    {
        return $this->andWhere(['removed' => 0]);
    }


}