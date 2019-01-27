<?php

namespace App\Business;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ConnectionDataBuilder
{
    public static function fromRequest($request) {
        $requestDriver = $request->input('driver');
        $requestHostname = $request->input('hostname');
        $requestPort = $request->input('port');
        $requestUsername = $request->input('username');
        $requestPassword = $request->input('password');
        $requestDatabase = $request->input('database');
        
        $connectionData = new ConnectionData();
        $connectionData->setDriver($requestDriver);
        $connectionData->setHost($requestHostname);
        $connectionData->setPort($requestPort);
        $connectionData->setUsername($requestUsername);
        $connectionData->setPassword($requestPassword);
        $connectionData->setDatabase($requestDatabase);
        
        return $connectionData;
    }
}
