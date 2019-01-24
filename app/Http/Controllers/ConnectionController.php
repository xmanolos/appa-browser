<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use App\Business\ConnectionData;
use App\Business\ResultMessageBuilder;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function testConnectionMethod(Request $request)
    {
        /* test mysql database:
            Driver('mysql');
            Host('db4free.net');
            Port('3306');
            Username('rootdb8');
            Password('12345678');
            Database('dbbrowser2');
        */

        try {
            $connectionData = ConnectionData::fromRequest($request);
            
            $connection = new Connection();
            $connection->create($connectionData);

            $connection = $connection->getInstance();
            $connection->getPdo();

            //TODO: Implements translations
            return ResultMessageBuilder::buildSuccessMessage("connection successful");
        } catch (\Exception $e) {
            return ResultMessageBuilder::buildErrorMessage( $e->getMessage() );
        }
    }
}
