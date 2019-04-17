<?php

namespace App\Business\Query\Executors;

use App\Business\Query\QueryExecutor;

/**
* Base Executor for Queries of drop type.
*
* @package App\Business\Query\Executors
*/
abstract class BaseDropExecutor extends QueryExecutor
{
    /**
    * Executes Query and sets the response of execution.
    */
    public function execute()
    {
        $this->connection->statement($this->query);

        $responseMessage = $this->getResponseMessage();

        $successResponse = $this->getSuccessResponse();
        $successResponse->setMessage($responseMessage);

        $this->response = $successResponse->getJson();
    }

    abstract protected function getResponseMessage();
}
