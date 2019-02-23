<?php

namespace App\Business;

use App\Business\ConnectionData;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Http\Request;

class ClientSession
{
    public static function isConnected(Request $request)
    {
        $session = $request->session();

        return SessionValues::get($session, 'connected', false);        
    }

    public static function getConnection(Request $request)
    {
        // TODO: Replicated code. See Connection.php
        $session = $request->session();

        $connectionConfig = [
            'driver'    => SessionValues::get($session, 'driver'),
            'host'      => SessionValues::get($session, 'hostname'),
            'port'      => SessionValues::get($session, 'port'),
            'database'  => SessionValues::get($session, 'database'),
            'username'  => SessionValues::get($session, 'username'),
            'password'  => SessionValues::get($session, 'password')
        ];

        $capsule = new Capsule;
        $capsule->addConnection($connectionConfig, 'client-connection');
        $capsule->bootEloquent();
        $capsule->setAsGlobal();

        return $capsule->getConnection('client-connection');
    }

    public static function storeConnection(Request $request, ConnectionData $connectionData)
    {
        $session = $request->session();
     
        SessionValues::set($session, 'driver', $connectionData->getDriver());
        SessionValues::set($session, 'hostname', $connectionData->getHost());
        SessionValues::set($session, 'port', $connectionData->getPort());
        SessionValues::set($session, 'username', $connectionData->getUsername());
        SessionValues::set($session, 'password', $connectionData->getPassword());
        SessionValues::set($session, 'database', $connectionData->getDatabase());
        SessionValues::set($session, 'connected', true);
    }

    public static function forgetConnection(Request $request)
    {
        $session = $request->session();

        SessionValues::forgetByKeys($session, ['driver', 'hostname', 'port', 'username', 'password', 'database']);
        SessionValues::set($session, 'connected', false);
    } 
}
