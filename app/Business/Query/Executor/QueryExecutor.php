<?php

namespace App\Business\Query\Executor;

use App\Business\Connection;
use Illuminate\Http\Request;

/**
 * @package App\Business\Query\Executor
 */
abstract class QueryExecutor
{
    /**
     * The query type identifier.
     */
    protected $identifier;

    /**
     * The response of query execution.
     */
    protected $response;

    /**
     * The request that requested the query execution.
     */
    protected $request;

    /**
     * The query that will be executed.
     */
    protected $query;

    /**
     * Defines the value of the request that requested the query execution.
     *
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
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
     * Gets a connection instance to the database.
     *
     * @return Connection\Connect
     */
    protected function getConnection()
    {
        return Connection::getInstance($this->request);
    }

    /**
     * Checks the query match with the executor.
     *
     * @return bool
     */
    public function queryMatch()
    {
        $queryUpperCase = strtoupper($this->query);
        
        return strpos($queryUpperCase, $this->identifier) === 0;
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