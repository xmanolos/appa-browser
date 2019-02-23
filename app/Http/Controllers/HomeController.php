<?php

namespace App\Http\Controllers;

use App\Business\ClientSession;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {   
    	if (ClientSession::isConnected($request)) 
        	return \view('home');

        return redirect(route('views.connect'));
    }
}
