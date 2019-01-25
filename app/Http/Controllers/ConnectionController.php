<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use App\Business\ConnectionData;
use App\Business\ResultMessageBuilder;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    //TODO: Implements translations
    private $successConnMsg = "connection successful";

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

            return ResultMessageBuilder::buildSuccessMessage($this->successConnMsg);
        } catch (\Exception $e) {
            return ResultMessageBuilder::buildErrorMessage( $e->getMessage() );
        }
    }
}
