<?php

namespace App\Http\Controllers;

use App\Business\AvailableDatabases;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    public function index()
    {
        $availableDatabases = AvailableDatabases::getAll();
        
        return \view('connect')->with('availableDatabases', $availableDatabases);
    }
}
