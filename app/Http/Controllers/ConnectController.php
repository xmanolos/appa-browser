<?php

namespace App\Http\Controllers;

use App\Business\Driver\AvailableDrivers;

class ConnectController extends Controller
{
    public function index()
    {
        $drivers = AvailableDrivers::getInstance()->getAll();

        return view('connect')->with('drivers', $drivers);
    }
}
