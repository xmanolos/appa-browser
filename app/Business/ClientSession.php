<?php

namespace App\Business;

use App\Business\ConnectionData;
use Illuminate\Http\Request;

class ClientSession
{
    public static function isConnected(Request $request)
    {
        $session = $request->session();

        return SessionValues::get($session, 'connected', false);        
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
