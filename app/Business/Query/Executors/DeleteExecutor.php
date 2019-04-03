<?php

namespace App\Business\Query\Executors;

use App\Business\Query\QueryExecutor;
use App\Business\Query\ExecutorConstants;
use Exception;

/**
 * Executor for Queries of delete type.
 *
 * @package App\Business\Query\Executors
 */
class DeleteExecutor extends QueryExecutor
{
    /**
     * Gets the keyword of the type of the Query of the Executor.
     *
     * @return string
     */
    public function getTypeKeyword()
    {
        return ExecutorConstants::KEYWORD_DELETE;
    }

    /**
     * Executes Query and sets the response of execution.
     */
    public function execute()
    {
        try 
        {
            $result = $this->connection->delete($this->query);

            $responseMessage = "Query executed successfully! $result rows deleted.";

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