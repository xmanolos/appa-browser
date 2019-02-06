<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnectController extends Controller
{
    public function index()
    {
        $availableDatabases = ['mysql' => 'MySQL', 'pgsql' => 'PostgreSQL'];
        
        return \view('connect')->with('availableDatabases', $availableDatabases);
    }
}
