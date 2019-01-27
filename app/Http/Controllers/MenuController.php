<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use App\Business\DatabaseDataBuilder;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $connection = Connection::getInstance($request);
        $databaseData = DatabaseDataBuilder::fromConnection($connection);
        
        return \view('menu')->with('databaseData', $databaseData);
    }
}
