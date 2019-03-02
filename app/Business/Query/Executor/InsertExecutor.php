<?php

namespace App\Business\Query\Executor;

use App\Business\Interfaces\IQueryExecutor;
use App\Business\Query\Executor\QueryExecutor;
use App\Business\Query\QueryResponse;

class InsertExecutor extends QueryExecutor implements IQueryExecutor
{
    public $executorIdentifier = 'INSERT';

    public function execute()
    {
        try 
        {
            $conenction = $this->getConnection();
            $result = $conenction->insert($this->query);
            $resultMessage = 'Query executed successfully! ' . $result . ' affected rows.'; // TODO: Use mix.

            $this->response = QueryResponse::getSuccess($this->executorIdentifier, $resultMessage);
        }
        catch (\Exception $exception)
        {
            $this->response = QueryResponse::getError($exception);
        }
    }
}