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
        try {
            Connection::connect($request);

            return ResultMessageBuilder::buildSuccessMessage($this->successConnMsg);
        } catch (\Exception $e) {
            return ResultMessageBuilder::buildErrorMessage( $e->getMessage() );
        }

        return $this->testConnection($request);
    }

    public function disconnect(Request $request)
    {
        Connection::disconnect($request);

        return \redirect(route('views.home'));
    }

    public function testConnection(Request $request)
    {
        try {
            Connection::test($request);

            return ResultMessageBuilder::buildSuccessMessage($this->successConnMsg);
        } catch (\Exception $e) {
            return ResultMessageBuilder::buildErrorMessage( $e->getMessage() );
        }
    }
}
