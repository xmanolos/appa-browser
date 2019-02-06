<?php

namespace App\Http\Controllers;

class MenuController extends Controller
{
    public function index()
    {   
        return \view('menu');
    }
}
