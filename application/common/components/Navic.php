<?php
namespace common\components;
use yii\base\Widget;
use Yii;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Navic
 *
 * @author Петя
 */
class Navic extends \yii\bootstrap\Nav {
    /**
     * Renders the widget.
     */
    public function run()
    {
        echo $this->renderItems();
    }
}
