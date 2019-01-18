<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use App\Business\ConnectionData;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function testConnectionMethod()
    {
        $connectionData = new ConnectionData();
        $connectionData->setDriver('mysql');
        $connectionData->setHost('db4free.netx');
        $connectionData->setPort('3306');
        $connectionData->setUsername('rootdb8');
        $connectionData->setPassword('12345678');  
        $connectionData->setDatabase('dbbrowser2');  

        $this->testConnection($connectionData);
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
            $connection->getPdo();
        }
        catch (\Exception $ex)
        {
            dd($ex);
        }
    }
}
