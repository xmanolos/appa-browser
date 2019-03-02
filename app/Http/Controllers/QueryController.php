<?php

namespace App\Http\Controllers;

use App\Business\Query\QueryRun;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function run(Request $request)
    {
    	$query = $request->input('query');
    	
    	$queryRun = new QueryRun();
    	$queryRun->setRequest($request);
    	$queryRun->setQuery($query);
    	
    	return $queryRun->execute();
    }
}
