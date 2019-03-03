<?php

namespace App\Business\Query\Executor;

use App\Business\Interfaces\IQueryExecutor;
use App\Business\Query\QueryResponse;

/**
 * A Executor for delete queries.
 *
 * @package App\Business\Query\Executor
 */
class DeleteExecutor extends QueryExecutor implements IQueryExecutor
{
    /**
     * The query type identifier.
     */
    protected $identifier = 'DELETE';

    /**
     * Performs the query and sets the result of execution.
     */
    public function execute()
    {
        try 
        {
            $connection = $this->getConnection();
            $result = $connection->delete($this->query);
            $resultMessage = "Query executed successfully! $result affected rows.";

            $this->response = QueryResponse::getSuccess($this->identifier, $resultMessage);
        }
        catch (\Exception $exception)
        {
            $this->response = QueryResponse::getError($exception);
        }
    }
}