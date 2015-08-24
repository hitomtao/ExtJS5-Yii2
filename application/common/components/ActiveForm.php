<?php

namespace common\components;

class ActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @var string|JsExpression a JS callback that will be called when the form is being submitted.
     * The signature of the callback should be:
     *
     * ~~~
     * function ($form) {
     *     ...return false to cancel submission...
     * }
     * ~~~
     */
    public $beforeSubmit;
    /**
     * @var string|JsExpression a JS callback that is called before validating an attribute.
     * The signature of the callback should be:
     *
     * ~~~
     * function ($form, attribute, messages) {
     *     ...return false to cancel the validation...
     * }
     * ~~~
     */
    public $beforeValidate;
    /**
     * @var string|JsExpression a JS callback that is called after validating an attribute.
     * The signature of the callback should be:
     *
     * ~~~
     * function ($form, attribute, messages) {
     * }
     * ~~~
     */
    public $afterValidate;

    public function run()
    {
        parent::run();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if($this->beforeSubmit) {
            $id = $this->options['id'];
            $view = $this->getView();
            $view->registerJs("jQuery('#$id').on('beforeSubmit', function() { return " . $this->beforeSubmit . "(this); });");
        }
    }
}