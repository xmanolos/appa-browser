<?php

namespace App\Business\Query\Executor;

use App\Business\Session\ExecutorConstants;

/**
 * A Executor for insert queries.
 *
 * @package App\Business\Query\Executor
 */
class InsertExecutor extends QueryExecutor
{
    /**
     * The query type keyword.
     */
    public $queryTypeKeyword = ExecutorConstants::KEYWORD_INSERT;

    /**
     * Execute the query.
     */
    public function execute()
    {
        try 
        {
            $result = $this->connection->insert($this->query);

            $responseMessage = "Query executed successfully! $result affected rows."; // TODO: Move to const

            $successResponse = $this->getSuccessResponse();
            $successResponse->setResponseMessage($responseMessage);

            $this->response = $successResponse->getJson();
        }
        catch (\Exception $exception)
        {
            $errorResponse = $this->getErrorResponse();
            $errorResponse->setResponseException($exception);

            $this->response = $errorResponse->getJson();
        }
    }
}