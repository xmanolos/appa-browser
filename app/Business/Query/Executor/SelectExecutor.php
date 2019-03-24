<?php

namespace App\Business\Query\Executor;

use App\Business\Query\QueryResponseEncode;
use App\Business\Session\ExecutorConstants;

/**
 * A Executor for select queries.
 *
 * @package App\Business\Query\Executor
 */
class SelectExecutor extends QueryExecutor
{
    /**
     * The query type keyword.
     */
    public $queryTypeKeyword = ExecutorConstants::KEYWORD_SELECT;

    /**
     * Execute the query.
     */
    public function execute()
    {
        try
        {
            $result = $this->connection->select($this->query);

            $responseMessage = 'Query executed successfully! ' . count($result) . ' rows found.'; // TODO: Move to const.

            if ($this->needConvertEncode())
                QueryResponseEncode::set($result);

            $successResponse = $this->getSuccessResponse();
            $successResponse->setResponseMessage($responseMessage);
            $successResponse->setResponseData($result);

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