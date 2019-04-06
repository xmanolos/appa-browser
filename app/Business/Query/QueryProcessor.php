<?php

namespace App\Business\Query;

use App\Business\Connection as ClientConnection;
use Illuminate\Database\Connection;
use Illuminate\Http\Request;

/**
 * Provides entries to execute a SQL Query.
 *
 * @package App\Business\Query
 */
class QueryProcessor
{
    /**
     * @var Request The request that requested the query execution.
     */
    protected $request;

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
     * @var Connection The connection where query will be executed.
     */
    protected $connection;

    /**
     * @var QueryExecutor The executor that will execute the query.
     */
    protected $executor;

    /**
     * @var string The response of the query execution.
     */
    protected $response;

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
     * Gets the response of the query execution.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->executor->getResponse();
    }

    /**
     * Executes the query.
     */
    public function execute()
    {
        $this->loadConnection();
        $this->loadExecutor();

        $this->executor->execute();
    }

    /**
     * Loads the connection where query will be executed.
     */
    private function loadConnection()
    {
        $this->connection = ClientConnection::getInstance($this->request); // TODO: Fix the ambiguity.
    }

    /**
     * Loads the executor that will execute the query.
     */
    private function loadExecutor()
    {
        $queryExecutorProcessor = new QueryIdentifier();
        $queryExecutorProcessor->setQuery($this->query);

        $this->executor = $queryExecutorProcessor->getExecutor();
        $this->executor->setConnection($this->connection);
        $this->executor->setSchemaName($this->schemaName);
        $this->executor->setSchemaCharset($this->schemaCharset);
    }
}