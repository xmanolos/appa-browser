<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;
use App\Business\Query\QueryExecutor;
use Exception;

/**
 * Executor for Queries of procedure type.
 *
 * @package App\Business\Query\Executors
 */
class ProcedureExecutor extends QueryExecutor
{
    /**
     * Gets the keyword of the type of the Query of the Executor.
     *
     * @return string
     */
    public function getTypeKeyword()
    {
        return ExecutorConstants::KEYWORD_PROCEDURE;
    }

    /**
     * Executes Query and sets the response of execution.
     */
    public function execute()
    {
        try 
        {
            $this->connection->statement($this->query);

            $responseMessage = 'Procedure executed successfully!';

            $successResponse = $this->getSuccessResponse();
            $successResponse->setResponseMessage($responseMessage);

            $this->response = $successResponse->getJson();
        }
        catch (Exception $exception)
        {
            $errorResponse = $this->getErrorResponse();
            $errorResponse->setResponseException($exception);

            $this->response = $errorResponse->getJson();
        }
    }
}