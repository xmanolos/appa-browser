<?php

namespace App\Business\Builders;

class ResultMessageBuilder
{
    const SUCCESS = "success";
    const ERROR = "error";

    const STATUS_PARAM = "status";
    const MSG_PARAM = "msg";

    public static function buildSuccessMessage($msg = "") {
        return ResultMessageBuilder::buildMessage(ResultMessageBuilder::SUCCESS, $msg);
    }

    public static function buildErrorMessage($msg = "") {
        return ResultMessageBuilder::buildMessage(ResultMessageBuilder::ERROR, $msg);
    }

    public static function buildMessage($status, $msg) {
        return [
            ResultMessageBuilder::STATUS_PARAM => $status,
            ResultMessageBuilder::MSG_PARAM => utf8_encode( $msg )
        ];
    }
}
