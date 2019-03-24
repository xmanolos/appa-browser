<?php

namespace App\Business\Query\Executor;

use App\Business\Session\ExecutorConstants;

/**
 * Provides entries to execute delete SQL Query.
 *
 * @package App\Business\Query\Executor
 */
class DeleteExecutor extends QueryExecutor
{
    /**
     * The query type keyword.
     */
    public $queryTypeKeyword = ExecutorConstants::KEYWORD_DELETE;

    /**
     * Execute the query.
     */
    public function execute()
    {
        try 
        {
            $result = $this->connection->delete($this->query);

            $responseMessage = "Query executed successfully! $result affected rows."; // TODO: Move to const.

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