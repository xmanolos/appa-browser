<?php

namespace App\Business;

use App\Business\ClientSession;
use App\Business\ConnectionConfig;
use App\Business\Connection\Connect;
use App\Business\Connection\ConnectionInfo;
use App\Business\Connection\Disconnect;
use App\Business\Connection\TestConnection;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Connection
{
    public static function getInstance(Request $request)
    {
        $clientSession = new ClientSession();
        $clientSession->setRequest($request);

        if ($clientSession->isConnected())
            return $clientSession->getConnection();

        return Connection::disonnect($request);
    }

    public static function connect(Request $request)
    {
        $connectionConfig = new ConnectionConfig();
        $connectionConfig->fromRequestInput($request);

        $connect = new Connect();
        $connect->setConnectionConfig($connectionConfig);
        $connect->execute();

        $clientSession = new ClientSession();
        $clientSession->setRequest($request);
        $clientSession->storeConnection($connectionConfig);
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
        $disonnect = new Disconnect();
        $disonnect->setRequest($request);
        $disonnect->execute();
    }

    public static function getInfo(Request $request)
    {
        $connectionInfo = new ConnectionInfo();
        $connectionInfo->setRequest($request);

        return $connectionInfo->get();
    }
}
