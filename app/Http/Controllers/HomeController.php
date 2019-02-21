<?php

namespace App\Http\Controllers;

use App\Business\Connection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {   
    	if (Connection::isConnected($request)) 
        	return \view('home');

        return redirect(route('views.connect'));
    }
}
