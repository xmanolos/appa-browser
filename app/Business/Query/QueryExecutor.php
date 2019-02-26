<?php

namespace App\Business\Query;

use App\Business\Query\Executor\SelectExecutor;
use App\Business\Query\Executor\InsertExecutor;
use App\Business\Query\Executor\UpdateExecutor;
use App\Business\Query\Executor\DeleteExecutor;

class QueryExecutor
{
    public static function get($query)
    {
        if (SelectExecutor::queryMatch($query)) {
            return new SelectExecutor;
        }

        if (InsertExecutor::queryMatch($query)) {
            return new InsertExecutor;
        }

        if (UpdateExecutor::queryMatch($query)) {
            return new UpdateExecutor;
        }

        if (DeleteExecutor::queryMatch($query)) {
            return new DeleteExecutor;
        }

        return null;
    }
}