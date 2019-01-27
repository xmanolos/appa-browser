<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $availableDatabases = ['mysql' => 'MySQL', 'pgsql' => 'PostgreSQL'];
        
        return \view('home')->with('availableDatabases', $availableDatabases);
    }
}
