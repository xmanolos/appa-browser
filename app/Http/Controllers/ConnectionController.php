<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use App\Business\ConnectionData;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function testConnectionMethod(Request $request)
    {
        $connectionData = new ConnectionData();
        /*$connectionData->setDriver('mysql');
        $connectionData->setHost('db4free.netx');
        $connectionData->setPort('3306');
        $connectionData->setUsername('rootdb8');
        $connectionData->setPassword('12345678');
        $connectionData->setDatabase('dbbrowser2');*/

        $connectionData->setDriver($request->input('driver'));
        $connectionData->setHost($request->input('hostname'));
        $connectionData->setPort($request->input('port'));
        $connectionData->setUsername($request->input('username'));
        $connectionData->setPassword($request->input('password'));
        $connectionData->setDatabase($request->input('database'));

        return $this->testConnection($connectionData);
    }

    public function connect($connectionData)
    {
        $connection = new Connection();
        $connection->create($connectionData);
        $connection->getInstance();
    }

    public function testConnection($connectionData)
    {
        try
        {
            $connection = new Connection();
            $connection->create($connectionData);

            $connection = $connection->getInstance();
            return ["data" => $connection->getPdo() ];
        }
        catch (\Exception $ex)
        {
            return ["data exception" => utf8_encode($ex->getMessage())];
        }
    }
}
