<?php

namespace App\Business\Query;

use App\Business\Query\Response\ErrorResponse;
use App\Business\Query\Response\SuccessResponse;

abstract class QueryExecutor implements IQueryExecutor
{
    protected $connection;

    protected $schemaName;

    protected $schemaCharset;

    protected $query;

    protected $response;

    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    public function setSchemaName($schemaName)
    {
        $this->schemaName = $schemaName;
    }

    /**
     * @todo This does not have to be passed in all classes. There is only one method that consumes this information and it can query it independently.
     */
    public function setSchemaCharset($schemaCharset)
    {
        $this->schemaCharset = $schemaCharset;
    }

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function queryMatch()
    {
        $typeKeyword = $this->getTypeKeyword();
        $queryUpperCase = strtoupper($this->query);

        return strpos($queryUpperCase, $typeKeyword) === 0;
    }

    protected function getSuccessResponse()
    {
        $typeKeyword = $this->getTypeKeyword();

        $successResponse = new SuccessResponse();
        $successResponse->setQuery($this->query);
        $successResponse->setQueryType($typeKeyword);

        return $successResponse;
    }

    protected function getErrorResponse()
    {
        $typeKeyword = $this->getTypeKeyword();

        $errorResponse = new ErrorResponse();
        $errorResponse->setQuery($this->query);
        $errorResponse->setQueryType($typeKeyword);

        return $errorResponse;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
