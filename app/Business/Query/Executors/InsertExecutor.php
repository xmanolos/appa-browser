<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;
use App\Business\Query\QueryExecutor;
use Exception;

/**
 * Executor for Queries of insert type.
 *
 * @package App\Business\Query\Executors
 */
class InsertExecutor extends QueryExecutor
{
    /**
     * Gets the keyword of the type of the Query of the Executor.
     *
     * @return string
     */
    public function getTypeKeyword()
    {
        return ExecutorConstants::KEYWORD_INSERT;
    }

    /**
     * Executes Query and sets the response of execution.
     */
    public function execute()
    {
        try 
        {
            $result = $this->connection->insert($this->query);

            $responseMessage = "Query executed successfully! $result affected rows.";

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