<?php

namespace App\Business\Query\Executors;

use App\Business\Query\QueryExecutor;
use App\Business\Query\QueryResponseEncode;
use App\Business\Query\ExecutorConstants;
use Exception;

/**
 * Executor for Queries of select type.
 *
 * @package App\Business\Query\Executors
 */
class SelectExecutor extends QueryExecutor
{
    /**
     * Gets the keyword of the type of the Query of the Executor.
     *
     * @return string
     */
    public function getTypeKeyword()
    {
        return ExecutorConstants::KEYWORD_SELECT;
    }

    /**
     * Executes Query and sets the response of execution.
     */
    public function execute()
    {
        try
        {
            $result = $this->connection->select($this->query);

            $responseMessage = 'Query executed successfully! ' . count($result) . ' rows found.';

            if ($this->needConvertEncode())
                QueryResponseEncode::set($result);

            $successResponse = $this->getSuccessResponse();
            $successResponse->setResponseMessage($responseMessage);
            $successResponse->setResponseData($result);

            $this->response = $successResponse->getJson();
        }
        catch (Exception $exception)
        {
            $errorResponse = $this->getErrorResponse();
            $errorResponse->setResponseException($exception);

            $this->response = $errorResponse->getJson();
        }
    }

    /**
     * Check if there is a need to force encode.
     *
     * @return bool
     */
    private function needConvertEncode()
    {
        $schemaCharsetUpperCase = strtoupper($this->schemaCharset);

        return $schemaCharsetUpperCase == ExecutorConstants::UTF8_ENCODE;
    }
}