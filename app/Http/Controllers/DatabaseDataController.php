<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use App\Business\DatabaseDataBuilder;
use Illuminate\Http\Request;

class DatabaseDataController extends Controller
{
    public function get(Request $request)
    {
        $databaseData = DatabaseDataBuilder::fromConnection($connection);
        
        return \json_encode($databaseData);
    }
}
