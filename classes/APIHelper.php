<?php

include_once 'classes/Dependencies.php';
include_once 'classes/Model.php';

class APIHelper {
    public static function json_safe_encode($obj) {
        if (empty($obj)) $obj = [];
        return json_encode($obj);
    }

    public static function handle_model_request(string $model_name, string $action, $id="", $where="", $data="") {
        if (empty($model_name)) return false;
        include_once("mvc/models/$model_name.php");
        $model = new $model_name;

        if ($action == 'list') {
            $response = $model->get_list($where);
            return self::json_safe_encode($response);
        }
        if ($action == 'get') {
            $response = $model->get_record($id);
            return self::json_safe_encode($response);
        }
    }
}