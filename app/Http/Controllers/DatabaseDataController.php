<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use App\Business\DatabaseDataBuilder;
use App\Business\ResultMessageBuilder;
use Illuminate\Http\Request;

class DatabaseDataController extends Controller
{
    public function get(Request $request)
    {
        $connection = Connection::getInstance($request);
        $databaseData = DatabaseDataBuilder::fromConnection($connection);
        
        return \json_encode($databaseData);
    }
}
