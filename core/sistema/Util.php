<?php


namespace core\sistema;


use DateTime;

class Util {

    public static function formataDataBR($data) {
        $nova_data = DateTime::createFromFormat("Y-m-d", $data);
        return $nova_data->format('d/m/Y');
    }
}
