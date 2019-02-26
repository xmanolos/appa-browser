<?php

namespace App\Business\Query;

use App\Business\Connection;
use App\Business\Query\QueryExecutor;
use App\Business\Query\QueryResponse;
use Illuminate\Http\Request;

class QueryRun
{
    public static function execute(Request $request, $query)
    {
        // TODO: Check null query.

        $queryExecutor = QueryExecutor::get($query);
        $queryExecutor->execute($request, $query);

        return $queryExecutor->getResponse();
    }
}