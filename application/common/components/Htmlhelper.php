<?php

namespace common\components;
/**
 * Description of Htmlelper
 *
 * @author Петя
 */
class Htmlhelper {
    /**
     * Получить статус кнопки
     * http://getbootstrap.com/components/#btn-dropdowns
     * @param type $id_status
     * @return string
     */
    public static function getBootstrapBtnStatus($id_status) {
//        echo "<br><br><br><br>";
//        var_dump($id_status);die;
//        echo "<br><br><br><br>";
        switch ($id_status) {
            case \common\models\ReservationStatus::OPEN:
                return "btn-primary";
                break;
            case \common\models\ReservationStatus::RESERVED_CLIENT:
                return "btn-warning";
                break;
            case \common\models\ReservationStatus::RESERVED:
                return "btn-success";
                break;
        }
    }

	public static function getMetaList($objects) {
		$ret = "";
		foreach ($objects as $object){
			if(isset($object->name)){
				$ret .= $object->name . ", ";
			}
		}
		return rtrim($ret, ", ");
	}
}
