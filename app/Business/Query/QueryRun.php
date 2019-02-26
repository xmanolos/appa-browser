<?php

namespace App\Business\Query;

use App\Business\Connection;
use App\Business\Query\QueryResponse;
use Illuminate\Http\Request;

class QueryRun
{
    public static function execute(Request $request, $query)
    {
    	try
    	{
            // TODO: Check null query.

			$connection = Connection::getInstance($request);
			$connection->statement($query);

    		return QueryResponse::success();
    	} 
    	catch (\Exception $exception) 
    	{
    		return QueryResponse::error($exception);
    	}
    }
}