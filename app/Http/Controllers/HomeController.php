<?php

namespace App\Http\Controllers;

use App\Business\ClientSession;
use App\Business\Connection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {   
        $clientSession = new ClientSession();
        $clientSession->setRequest($request);

    	if ($clientSession->isConnected()) 
        	return \view('home');

        return \redirect(route('connect'));
    }
}
