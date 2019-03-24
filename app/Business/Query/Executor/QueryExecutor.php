<?php

namespace App\Business\Query\Executor;

use App\Business\Interfaces\IQueryExecutor;
use App\Business\Query\Response\ErrorResponse;
use App\Business\Query\Response\SuccessResponse;
use App\Business\Session\ExecutorConstants;
use Illuminate\Database\Connection;

/**
 * Provides the base of queries executors.
 *
 * @package App\Business\Query\Executor
 */
abstract class QueryExecutor implements IQueryExecutor
{
    /**
     * @var string The query type keyword.
     */
    public $queryTypeKeyword;

    /**
     * @var Connection The connection where query will be executed.
     */
    protected $connection;

    /**
     * @var string The name of the schema where query will be executed.
     */
    protected $schemaName;

    /**
     * @var string The charset of the schema where query will be executed.
     */
    protected $schemaCharset;

    /**
     * @var string The query that will be executed.
     */
    protected $query;

    /**
     * @var string The response of query execution.
     */
    protected $response;

    /**
     * Defines the value of the connection where query will be executed.
     *
     * @param Connection $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Defines the value of the name of the schema where query will be executed.
     *
     * @param string $schemaName
     */
    public function setSchemaName($schemaName)
    {
        $this->schemaName = $schemaName;
    }

    /**
     * Defines the value of the charset of the schema where query will be executed.
     *
     * @param string $schemaCharset
     */
    public function setSchemaCharset($schemaCharset)
    {
        $this->schemaCharset = $schemaCharset;
    }

    /**
     * Defines the value of the query that will be executed.
     *
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * Checks the query match with the executor.
     *
     * @return bool
     */
    public function queryMatch()
    {
        $queryUpperCase = strtoupper($this->query);

        return strpos($queryUpperCase, $this->queryTypeKeyword) === 0;
    }

    /**
     * Checks whether the result of the query that needs encode is forced.
     *
     * @return bool
     */
    public function needConvertEncode()
    {
        $schemaCharsetUpperCase = strtoupper($this->schemaCharset);

        return $schemaCharsetUpperCase == ExecutorConstants::UTF8_ENCODE;
    }

    /**
     * Gets an initial Success Response.
     *
     * @return SuccessResponse
     */
    protected function getSuccessResponse()
    {
        $successResponse = new SuccessResponse();
        $successResponse->setQuery($this->query);
        $successResponse->setQueryType($this->queryTypeKeyword);

        return $successResponse;
    }

    /**
     * Gets an initial Error Response.
     *
     * @return ErrorResponse
     */
    protected function getErrorResponse()
    {
        $errorResponse = new ErrorResponse();
        $errorResponse->setQuery($this->query);
        $errorResponse->setQueryType($this->queryTypeKeyword);

        return $errorResponse;
    }

    /**
     * Gets the result of execution.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }
}