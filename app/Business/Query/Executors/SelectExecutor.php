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
        $responseData = $this->connection->select($this->query);
        $responseDataCount = count($responseData);

        $responseMessage = "Query executed successfully! $responseDataCount rows selected.";

        if ($this->needConvertEncode())
            QueryResponseEncode::set($responseData);

        $successResponse = $this->getSuccessResponse();
        $successResponse->setMessage($responseMessage);
        $successResponse->setData($responseData);

        $this->response = $successResponse->getJson();
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
