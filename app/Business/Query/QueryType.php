<?php

namespace App\Business\Query;

use App\Business\Query\Executor\AnyExecutor;
use App\Business\Query\Executor\DeleteExecutor;
use App\Business\Query\Executor\InsertExecutor;
use App\Business\Query\Executor\SelectExecutor;
use App\Business\Query\Executor\UpdateExecutor;
use Illuminate\Http\Request;

/**
 * Gets the executor for a query according to its type.
 *
 * @package App\Business\Query
 */
class QueryType
{
    /**
     * The request that requested the query identification.
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
     * The query that will be identified.
     */
    protected $query;

    /**
     * Defines the value of the request that requested the query identification.
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
     * Defines the value of the query that will be identified.
     *
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * Gets the executor for the query.
     *
     * @return AnyExecutor|SelectExecutor|InsertExecutor|UpdateExecutor|DeleteExecutor
     */
    public function getExecutor()
    {
        $selectExecutor = new SelectExecutor();
        $selectExecutor->setRequest($this->request);
        $selectExecutor->setSchemaName($this->schemaName);
        $selectExecutor->setSchemaCharset($this->schemaCharset);
        $selectExecutor->setQuery($this->query);

        if ($selectExecutor->queryMatch()) return $selectExecutor;

        $insertExecutor = new InsertExecutor();
        $insertExecutor->setRequest($this->request);
        $insertExecutor->setQuery($this->query);

        if ($insertExecutor->queryMatch()) return $insertExecutor;

        $updateExecutor = new UpdateExecutor();
        $updateExecutor->setRequest($this->request);
        $updateExecutor->setQuery($this->query);

        if ($updateExecutor->queryMatch()) return $updateExecutor;

        $deleteExecutor = new DeleteExecutor();
        $deleteExecutor->setRequest($this->request);
        $deleteExecutor->setQuery($this->query);

        if ($deleteExecutor->queryMatch()) return $deleteExecutor;

        $anyExecutor = new AnyExecutor();
        $anyExecutor->setRequest($this->request);
        $anyExecutor->setQuery($this->query);

        return $anyExecutor;
    }
}