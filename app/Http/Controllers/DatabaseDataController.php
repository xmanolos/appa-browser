<?php

namespace App\Http\Controllers;

use App\Business\Builders\DatabaseDataBuilder;
use Illuminate\Http\Request;

class DatabaseDataController extends Controller
{
    public function get(Request $request)
    {
        $databaseData = DatabaseDataBuilder::fromConnection($request);
        
        return \json_encode($databaseData);
    }
}
