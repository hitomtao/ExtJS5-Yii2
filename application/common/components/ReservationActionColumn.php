<?php
namespace common\components;
use Yii;
use Closure;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\QuestReservation;
use common\models\ReservationStatus;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ActionCol
 *
 * @author Skripov.in <skripov.in@gmail.com>
 */
class ReservationActionColumn extends \yii\grid\ActionColumn {
	/**
     * Initializes the default button rendering callbacks
     */
	public $template = '{confirm_reserv} {update} {delete}';
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['confirm_reserv'])) {
            $this->buttons['confirm_reserv'] = function ($url, QuestReservation $model) {
                return $model->reservationStatus->id==ReservationStatus::RESERVED_CLIENT ? Html::a('<span class="glyphicon glyphicon-thumbs-up"></span>', [
					'qr/confirm',
					'id_quest'=>$model->id_quest,
					'date'=>$model->date,
					'id_time'=>$model->id_time,
				], [
                    'title' => 'Подтвердить резерв',
					'data-confirm' => Yii::t('yii', 'Вы уверены, что хотите подтвердить резерв?'),
                    'data-pjax' => '0',
                ]) : null;
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                    'title' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                ]);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                    'title' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]);
            };
        }
    }
}
