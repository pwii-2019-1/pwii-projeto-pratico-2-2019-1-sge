<?php


namespace core\sistema;


use DateTime;

class Util {

    public static function formataDataBR($data) {
        $nova_data = DateTime::createFromFormat("Y-m-d", $data);
        return $nova_data->format('d/m/Y');
    }

    public static function formataDtHrBR($data) {
        $nova_data = DateTime::createFromFormat("Y-m-d H:i:s", $data);
        return $nova_data->format('d/m/Y H:i:s');
    }

    public static function ano($data) {
        $dt = explode("-", $data);
        return $dt[0];
    }

    public static function mes($data) {
        $dt = explode("-", $data);
        return $dt[1];
    }

    public static function dia($data) {
        $dt = explode("-", $data);
        $dt = explode(" ", $dt[2]);
        return $dt[0];
    }

    public static function hora($data) {
        $dt = explode("-", $data);
        $dt = explode(" ", $dt[2]);
        $dt = explode(":", $dt[1]);
        return $dt[0];
    }

    public static function min($data) {
        $dt = explode("-", $data);
        $dt = explode(" ", $dt[2]);
        $dt = explode(":", $dt[1]);
        return $dt[1];
    }

    public static function seg($data) {
        $dt = explode("-", $data);
        $dt = explode(" ", $dt[2]);
        $dt = explode(":", $dt[1]);
        return $dt[2];
    }
}
