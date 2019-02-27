<?php

namespace App\Business\Query;

use App\Business\Query\Executor\DeleteExecutor;
use App\Business\Query\Executor\InsertExecutor;
use App\Business\Query\Executor\SelectExecutor;
use App\Business\Query\Executor\UpdateExecutor;
use Illuminate\Http\Request;

class QueryExecutor
{
    public static function get(Request $request, $query)
    {
        $selectExecutor = new SelectExecutor($request, $query);
        
        if ($selectExecutor->queryMatch()) {
            return $selectExecutor;
        }

        $insertExecutor = new InsertExecutor($request, $query);

        if ($insertExecutor->queryMatch()) {
            return $insertExecutor;
        }

        $updateExecutor = new UpdateExecutor($request, $query);

        if ($updateExecutor->queryMatch()) {
            return $updateExecutor;
        }

        $deleteExecutor = new DeleteExecutor($request, $query);

        if ($deleteExecutor->queryMatch()) {
            return $deleteExecutor;
        }

        // TODO: Null? Any!
        return null;
    }
}