<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;
use App\Business\Query\QueryExecutor;
use Exception;

/**
 * Executor for Queries of update type.
 *
 * @package App\Business\Query\Executors
 */
class UpdateExecutor extends QueryExecutor
{
    /**
     * Gets the keyword of the type of the Query of the Executor.
     *
     * @return string
     */
    public function getTypeKeyword()
    {
        return ExecutorConstants::KEYWORD_UPDATE;
    }

    /**
     * Executes Query and sets the response of execution.
     */
    public function execute()
    {
        try
        {
            $result = $this->connection->update($this->query);

            $successResponse = $this->getSuccessResponse();
            $successResponse->setResponseMessage("Query executed successfully! $result affected rows.");

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