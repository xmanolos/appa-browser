<?php

namespace App\Http\Controllers;

use App\Business\Query\QueryRun;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function run(Request $request)
    {
    	$query = $request->input('query');
    	
    	return QueryRun::execute($request, $query);
    }
}
