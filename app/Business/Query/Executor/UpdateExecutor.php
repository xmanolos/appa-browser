<?php

namespace App\Business\Query\Executor;

use App\Business\Session\ExecutorConstants;

/**
 * A Executor for update queries.
 *
 * @package App\Business\Query\Executor
 */
class UpdateExecutor extends QueryExecutor
{
    /**
     * The query type keyword.
     */
    public $queryTypeKeyword = ExecutorConstants::KEYWORD_UPDATE;

    /**
     * Execute the query.
     */
    public function execute()
    {
        try
        {
            $result = $this->connection->update($this->query);

            $successResponse = $this->getSuccessResponse();
            $successResponse->setResponseMessage("Query executed successfully! $result affected rows."); // TODO: Move to const.

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