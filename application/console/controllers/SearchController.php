<?php
namespace console\controllers;
use Yii;
use yii\console\controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchController
 *
 * @author Ultra
 */
class SearchController extends \yii\console\Controller {
	public function actionIndexing()
    {
       /** @var \himiklab\yii2\search\Search $search */
        $search = Yii::$app->search;
        $search->index();
    }
}

