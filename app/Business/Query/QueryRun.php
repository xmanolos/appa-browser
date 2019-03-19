<?php

namespace App\Business\Query;

use Illuminate\Http\Request;

/**
 * Execute a query.
 *
 * @package App\Business\Query
 */
class QueryRun
{
    /**
     * The request that requested the query execution.
     */
    protected $request;

    /**
     * The name of the schema where query will be executed.
     */
    protected $schemaName;

    /**
     * The charset of the schema where query will be executed.
     */
    protected $schemaCharset;

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
     * Performs the query and obtains the result of execution.
     *
     * @return string
     */
    public function execute()
    {
        $queryExecutor = $this->getExecutor();
        $queryExecutor->execute();

        return $queryExecutor->getResponse();
    }

    /**
     * Gets the executor for the query.
     *
     * @return Executor\AnyExecutor|Executor\SelectExecutor|Executor\InsertExecutor|Executor\UpdateExecutor|Executor\DeleteExecutor
     */
    private function getExecutor()
    {
    	$queryType = new QueryType();
    	$queryType->setRequest($this->request);
        $queryType->setSchemaName($this->schemaName);
        $queryType->setSchemaCharset($this->schemaCharset);
        $queryType->setQuery($this->query);

        return $queryType->getExecutor();
    }
}