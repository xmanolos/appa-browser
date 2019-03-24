<?php

namespace App\Business\Query\Executor;

use App\Business\Session\ExecutorConstants;

/**
 * Provides entries to execute any SQL Query.
 *
 * @package App\Business\Query\Executor
 */
class AnyExecutor extends QueryExecutor
{
    /**
     * The query type keyword.
     */
    public $queryTypeKeyword = ExecutorConstants::KEYWORD_ANY;

    /**
     * Execute the query.
     */
    public function execute()
    {
        try 
        {
            $this->connection->statement($this->query);

            $responseMessage = 'Query executed successfully! Unknown result.'; // TODO: Move to const.

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