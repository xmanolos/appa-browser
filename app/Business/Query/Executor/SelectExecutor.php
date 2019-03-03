<?php

namespace App\Business\Query\Executor;

use App\Business\Interfaces\IQueryExecutor;
use App\Business\Query\Executor\QueryExecutor;
use App\Business\Query\QueryResponse;

class SelectExecutor extends QueryExecutor implements IQueryExecutor
{
    public $executorIdentifier = 'SELECT';

    public function execute()
    {
        try 
        {
            $connection = $this->getConnection();
            $result = $connection->select($this->query);
            $resultMessage = 'Query executed successfully! ' . count($result) . ' finded rows.';

            $this->response = QueryResponse::getSuccess($this->executorIdentifier, $resultMessage, $result);
        }
        catch (\Exception $exception)
        {
            $this->response = QueryResponse::getError($exception);
        }
    }
}