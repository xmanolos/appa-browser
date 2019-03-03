<?php

namespace App\Business\Query\Executor;

use App\Business\Interfaces\IQueryExecutor;
use App\Business\Query\Executor\QueryExecutor;
use App\Business\Query\QueryResponse;

class AnyExecutor extends QueryExecutor implements IQueryExecutor
{
    public $executorIdentifier = 'ANY';

    public function execute()
    {
        try 
        {
            $connection = $this->getConnection();
            $connection->statement($this->query);
            
            $resultMessage = 'Query executed successfully! Unknown result.';

            $this->response = QueryResponse::getSuccess($this->executorIdentifier, $resultMessage);
        }
        catch (\Exception $exception)
        {
            $this->response = QueryResponse::getError($exception);
        }
    }
}