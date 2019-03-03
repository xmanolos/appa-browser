<?php

namespace App\Business\Query\Executor;

use App\Business\Interfaces\IQueryExecutor;
use App\Business\Query\QueryResponse;

/**
 * A Executor for any queries.
 *
 * @package App\Business\Query\Executor
 */
class AnyExecutor extends QueryExecutor implements IQueryExecutor
{
    /**
     * The query type identifier.
     */
    protected $identifier = 'ANY';

    /**
     * Performs the query and sets the result of execution.
     */
    public function execute()
    {
        try 
        {
            $connection = $this->getConnection();
            $connection->statement($this->query);
            
            $resultMessage = 'Query executed successfully! Unknown result.';

            $this->response = QueryResponse::getSuccess($this->identifier, $resultMessage);
        }
        catch (\Exception $exception)
        {
            $this->response = QueryResponse::getError($exception);
        }
    }
}