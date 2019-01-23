<?php

namespace App\Business;

class ResultMessageBuilder
{
    const SUCCESS = "success";
    const ERROR = "error";

    public static function buildSuccessMessage($msg = "") {
        return [
            "status" => ResultMessageBuilder::SUCCESS,
            "msg" => utf8_encode( $msg )
        ];
    }

    public static function buildErrorMessage($msg = "") {
        return [
            "status" => ResultMessageBuilder::ERROR,
            "msg" => utf8_encode( $msg )
        ];
    }
}
