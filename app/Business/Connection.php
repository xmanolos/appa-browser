<?php

namespace App\Business;

use App\Business\Connection\Connect;
use App\Business\Connection\ConnectionInfo;
use App\Business\Connection\Disconnect;
use App\Business\Connection\TestConnection;
use App\Business\Session\ConnectionSession;
use Illuminate\Http\Request;

class Connection
{
    public static function getInstance(Request $request)
    {
        $connectionSession = new ConnectionSession();
        $connectionSession->fromRequest($request);

        if ($connectionSession->isConnected())
            return $connectionSession->get();

        Connection::disonnect($request);

        return null;
    }

    public static function connect(Request $request)
    {
        $connectionConfig = new ConnectionConfig();
        $connectionConfig->fromRequestInput($request);

        $connect = new Connect(); // TODO: Can not we take this to ConnectionSession?
        $connect->setConnectionConfig($connectionConfig);
        $connect->execute();

        $connectionSession = new ConnectionSession();
        $connectionSession->fromRequest($request);

        $connectionSession->set($connectionConfig);
    }

    public static function test(Request $request)
    {
        $connectionConfig = new ConnectionConfig();
        $connectionConfig->fromRequestInput($request);

        $testConnection = new TestConnection();
        $testConnection->setConnectionConfig($connectionConfig);
        $testConnection->execute();
    }

    public static function disconnect(Request $request)
    {
        $disconnect = new Disconnect();
        $disconnect->setRequest($request);
        $disconnect->execute();
    }

    public static function getInfo(Request $request)
    {
        $connectionInfo = new ConnectionInfo();
        $connectionInfo->setRequest($request);

        return $connectionInfo->get();
    }
}
