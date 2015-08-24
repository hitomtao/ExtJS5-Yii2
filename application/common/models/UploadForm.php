<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadForm
 *
 * @author Skripov.in <skripov.in@gmail.com>
 */
class UploadForm extends Model{
	/**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }
}
