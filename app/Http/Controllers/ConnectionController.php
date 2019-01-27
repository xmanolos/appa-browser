<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use App\Business\ConnectionDataBuilder;
use App\Business\ResultMessageBuilder;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    //TODO: Implements translations
    private $successConnMsg = "connection successful";

    public function testConnectionMethod(Request $request)
    {
        /* Chama o método fillConnectionData no console pra preencher os campos. */

        try {
            $connectionData = ConnectionDataBuilder::fromRequest($request);

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
