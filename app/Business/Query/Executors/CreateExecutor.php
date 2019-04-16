<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;
use App\Business\Query\QueryExecutor;
use Exception;

/**
* Executor for Queries of create type.
*
* @package App\Business\Query\Executors
*/
class CreateExecutor extends QueryExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeyword()
    {
        return ExecutorConstants::KEYWORD_CREATE;
    }

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

    private function getResponseMessage()
    {
        $typeKeyword = $this->getTypeKeyword();
        $queryUpperCase = strtoupper($this->query);

        if (strpos($queryUpperCase, "$typeKeyword TABLE") !== false)
        return 'Table created successfully!';

        if (strpos($queryUpperCase, "$typeKeyword VIEW") !== false)
        return 'View created successfully!';

        if (strpos($queryUpperCase, "$typeKeyword PROCEDURE") !== false)
        return 'Procedure created successfully!';

        if (strpos($queryUpperCase, "$typeKeyword FUNCTION") !== false)
        return 'Function created successfully!';

        if (strpos($queryUpperCase, "$typeKeyword INDEX") !== false)
        return 'Index created successfully!';

        return 'Query executed successfully!';
    }
}
