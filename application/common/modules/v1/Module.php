<?php
namespace common\modules\v1;

/**
 * Rest API module
 * 
 * @author Ivan Skripov <skripov.in@gmail.com>
 * @since 1.0.0
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'common\modules\v1\controllers';

    public function init()
    {
        parent::init();        
    }
}
