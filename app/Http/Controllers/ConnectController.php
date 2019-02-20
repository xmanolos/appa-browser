<?php

namespace App\Http\Controllers;

use App\Business\Databases\AvailableDatabases;

class ConnectController extends Controller
{
    public function index()
    {
        $availableDatabases = AvailableDatabases::getAll();
        
        return \view('connect')->with('availableDatabases', $availableDatabases);
    }
}
