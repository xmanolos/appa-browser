<?php

namespace App\Business\Query\Executor;

use App\Business\Interfaces\IQueryExecutor;
use App\Business\Query\QueryResponse;
use App\Business\Query\QueryResponseEncode;

/**
 * A Executor for select queries.
 *
 * @package App\Business\Query\Executor
 */
class SelectExecutor extends QueryExecutor implements IQueryExecutor
{
    /**
     * The query type identifier.
     */
    protected $identifier = 'SELECT';

    /**
     * Performs the query and sets the result of execution.
     */
    public function execute()
    {
        try
        {
            $connection = $this->getConnection();
            $result = $connection->select($this->query);

            if ($this->schemaCharset != 'utf8')
                QueryResponseEncode::set($result);

            $resultMessage = 'Query executed successfully! ' . count($result) . ' rows found.';

            $this->response = QueryResponse::getSuccess($this->identifier, $resultMessage, $result);
        }
        catch (\Exception $exception)
        {
            $this->response = QueryResponse::getError($exception);
        }
    }
}