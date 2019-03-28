<?php

namespace App\Business\Query\Executor;

use App\Business\Session\ExecutorConstants;

/**
 * Provides entries to execute precedure SQL Query.
 *
 * @package App\Business\Query\Executor
 */
class ProcedureExecutor extends QueryExecutor
{
    /**
     * The query type keyword.
     */
    public $queryTypeKeyword = ExecutorConstants::KEYWORD_PROCEDURE;

    /**
     * Execute the query.
     */
    public function execute()
    {
        try 
        {
            $this->connection->statement($this->query);

            $responseMessage = 'Procedure executed successfully!'; // TODO: Move to const.

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