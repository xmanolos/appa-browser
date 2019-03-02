<?php

namespace App\Http\Controllers;

use App\Business\Builders\ConnectionDataBuilder;
use App\Business\Builders\ResultMessageBuilder;
use App\Business\Connection;
use App\Business\CustomResponse;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function connect(Request $request)
    {
        try 
        {
            Connection::test($request);
            Connection::connect($request);

            $response = new CustomResponse();
            $response->addSuccessStatus('Connection established successfully!');

            return $response->getJson();
        } 
        catch (\Exception $exception) 
        {
            $response = new CustomResponse();
            $response->addErrorStatus($exception->getMessage());

            return $response->getJson();
        }
    }

    public function disconnect(Request $request)
    {
        Connection::disconnect($request);

        return \redirect(route('home'));
    }

    public function testConnection(Request $request)
    {
        try 
        {
            Connection::test($request);

            $response = new CustomResponse();
            $response->addSuccessStatus('Connection established successfully!');

            return $response->getJson();
        } 
        catch (\Exception $exception) 
        {
            $response = new CustomResponse();
            $response->addErrorStatus($exception->getMessage());

            return $response->getJson();
        }
    }
}