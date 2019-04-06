<?php

namespace App\Http\Controllers;

use App\Business\Driver\AvailableDrivers;
use App\Business\Session\ConnectionSession;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    public function index(Request $request)
    {
        $connectionSession = new ConnectionSession();
        $connectionSession->fromRequest($request);

        if ($connectionSession->isConnected())
            return response()->redirectToRoute('home');

        $drivers = AvailableDrivers::getInstance()->getAll();

        return view('connect')->with('drivers', $drivers);
    }
}
