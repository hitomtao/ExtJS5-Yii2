<?php
use yii\db\ActiveRecord;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelProvider
 *
 * @author Петя
 */
class ModelProvider {
	/**
	 * модель категории
	 * @var ActiveRecord
	 */
	private $_model;
	/**
	 * название модели, прикрепленной к категории
	 * @param string $instance
	 */
	public function __construct($instance) {
		 $this->_model = new $instance;
	}
	
	public function create($parent_id) {
		
	}
	
	public function update($parent_id) {
		
	}
	
	/**
	 * 
	 * @return ActiveRecord
	 */
	public function getModel() {
		return $this->_model;
	}

}
