<?php

namespace App\Http\Controllers;

use App\Business\Session\ConnectionSession;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $connectionSession = new ConnectionSession();
        $connectionSession->fromRequest($request);

        if ($connectionSession->isConnected())
            return view('home');

        return redirect(route('connect'));
    }
}
