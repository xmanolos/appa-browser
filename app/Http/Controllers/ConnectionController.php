<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use Exception;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function connect(Request $request)
    {
        try
        {
            Connection::test($request);
            Connection::connect($request);

            return response([], 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function disconnect(Request $request)
    {
        Connection::disconnect($request);
        
        return redirect(route('home'));
    }

    public function testConnection(Request $request)
    {
        try
        {
            Connection::test($request);

            return response([], 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getInfo(Request $request)
    {
        try
        {
            $connectionInfo = Connection::getInfo($request);

            return response($connectionInfo, 200);
        }
        catch (Exception $exception)
        {
            return response($exception->getMessage(), 500);
        }
    }
}