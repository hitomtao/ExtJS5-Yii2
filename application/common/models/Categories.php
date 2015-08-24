<?php
namespace common\models;

use yii\db\ActiveRecord;


/**
 * Lists of categories
 *
 * @author Ultra
 */
class Categories extends ActiveRecord {
	public $_catagories;

	//корень дерева
	static $ROOT = 0;

	public function init() {
		parent::init();
		foreach(Category::find()->all() as $category){
			$this->_catagories[$category->parent_id][] = $category;
		}
		//print_r($this->_catagories);die;
	}

	public function getTree($parent_id, $level) {
		if (isset($this->_catagories[$parent_id])) { //Если категория с таким parent_id существует
            foreach ($this->_catagories[$parent_id] as $category) { //Обходим ее
                //echo "<div style='margin-left:" . ($level * 25) . "px;'>" . $category->name . "</div>";
				echo "<ul>";
				echo "<li class='element'><a data-id='{$category->id}'>{$category->name}</a><span class='add glyphicon glyphicon-plus'></span><span class='edit glyphicon glyphicon-pencil'></span><span class='del glyphicon glyphicon-remove'></span></li>";
                $level++;
                $this->getTree($category->id, $level);
                $level--;
				echo "</ul>";
            }
        }
	}
}