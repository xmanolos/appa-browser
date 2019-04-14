<?php

namespace App\Business\ConnectionData;

use App\Business\Session\SessionProcessor;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ConnectionDataFactory
{
    public static function createFromRequest(Request $request)
    {
        $connectionData = new ConnectionData();
        $connectionData->driver = $request->input('driver');
        $connectionData->host = $request->input('host');
        $connectionData->port = $request->input('port');
        $connectionData->username = $request->input('username');
        $connectionData->password = $request->input('password');
        $connectionData->database = $request->input('database');

        return $connectionData;
    }

    public static function createFromSession(Session $session)
    {
        $sessionProcessor = new SessionProcessor();
        $sessionProcessor->setSession($session);

        $connectionData = new ConnectionData();
        $connectionData->driver = $session->get('driver');
        $connectionData->host = $session->get('host');
        $connectionData->port = $session->get('port');
        $connectionData->username = $session->get('username');
        $connectionData->password = $session->get('password');
        $connectionData->database = $session->get('database');

        return $connectionData;
    }
}