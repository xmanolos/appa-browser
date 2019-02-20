<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use App\Business\Builders\ConnectionDataBuilder;
use App\Business\Builders\ResultMessageBuilder;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    // TODO: Fix text location.
    private $successConnMsg = "connection successful";

    public function connect(Request $request)
    {
        return $this->testConnection($request);
    }

    public function testConnection(Request $request)
    {
        try {
            $connectionData = ConnectionDataBuilder::fromRequest($request);

            $request->session()->put('driver', $connectionData->getDriver());
            $request->session()->put('hostname', $connectionData->getHost());
            $request->session()->put('port', $connectionData->getPort());
            $request->session()->put('username', $connectionData->getUsername());
            $request->session()->put('password', $connectionData->getPassword());  
            $request->session()->put('database', $connectionData->getDatabase());  

            $connection = Connection::getInstance($request);
            $connection->getPdo();

            return ResultMessageBuilder::buildSuccessMessage($this->successConnMsg);
        } catch (\Exception $e) {
            return ResultMessageBuilder::buildErrorMessage( $e->getMessage() );
        }
    }
}
