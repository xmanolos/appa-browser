<?php

namespace App\Business\Query\Executor;

use App\Business\Interfaces\IQueryExecutor;
use App\Business\Query\Executor\QueryExecutor;
use App\Business\Query\QueryResponse;

class DeleteExecutor extends QueryExecutor implements IQueryExecutor
{
    public $executorIdentifier = 'DELETE';

    public function execute()
    {
        try 
        {
            $result = $this->connection->delete($this->query);
            $resultMessage = 'Query executed successfully! ' . $result . ' affected rows.'; // TODO: Use mix.

            $this->response = QueryResponse::getSuccess($this->executorIdentifier, $resultMessage);
        }
        catch (\Exception $exception)
        {
            $this->response = QueryResponse::getError($exception);
        }
    }
}