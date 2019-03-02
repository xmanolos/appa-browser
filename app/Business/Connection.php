<?php

namespace App\Business;

use App\Business\Builders\ConnectionDataBuilder;
use App\Business\ClientSession;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Connection
{
    public static function getInstance(Request $request)
    {
        if (ClientSession::isConnected($request))
            return ClientSession::getConnection($request);

        return redirect(route('home'));
    }

    public static function connect(Request $request)
    {
        $connectionData = ConnectionDataBuilder::fromRequest($request);
        $connectionConfig = Connection::getConnectionConfig($connectionData);

        $capsule = new Capsule;
        $capsule->addConnection($connectionConfig, 'client-connection');
        $capsule->bootEloquent();
        $capsule->setAsGlobal();

        ClientSession::storeConnection($request, $connectionData);

        return $capsule->getConnection('client-connection');
    }

    public static function test(Request $request)
    {
        $connectionData = ConnectionDataBuilder::fromRequest($request);
        $connectionConfig = Connection::getConnectionConfig($connectionData);

        $capsule = new Capsule;
        $capsule->addConnection($connectionConfig, 'client-connection-test');
        
        $capsule->getConnection('client-connection-test')->getPdo();
    }    

    public static function disconnect(Request $request)
    {
        ClientSession::forgetConnection($request);

        DB::purge('custom-connection');
    }

    private static function getConnectionConfig($connectionData)
    {
        return [
            'driver'    => $connectionData->getDriver(),
            'host'      => $connectionData->getHost(),
            'port'      => $connectionData->getPort(),
            'database'  => $connectionData->getDatabase(),
            'username'  => $connectionData->getUsername(),
            'password'  => $connectionData->getPassword()
        ];
    }
}
