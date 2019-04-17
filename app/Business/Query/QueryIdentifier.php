<?php

namespace App\Business\Query;

use App\Business\Query\Executors\AnyExecutor;
use App\Business\Query\Executors\CreateFunctionExecutor;
use App\Business\Query\Executors\CreateIndexExecutor;
use App\Business\Query\Executors\CreateProcedureExecutor;
use App\Business\Query\Executors\CreateTableExecutor;
use App\Business\Query\Executors\CreateViewExecutor;
use App\Business\Query\Executors\DeleteExecutor;
use App\Business\Query\Executors\DropFunctionExecutor;
use App\Business\Query\Executors\DropIndexExecutor;
use App\Business\Query\Executors\DropProcedureExecutor;
use App\Business\Query\Executors\DropTableExecutor;
use App\Business\Query\Executors\DropViewExecutor;
use App\Business\Query\Executors\InsertExecutor;
use App\Business\Query\Executors\ProcedureExecutor;
use App\Business\Query\Executors\SelectExecutor;
use App\Business\Query\Executors\UpdateExecutor;

/**
 * Provides entries to identify the query.
 *
 * @package App\Business\Query
 */
class QueryIdentifier
{
    /**
     * @var string The query that will be identified.
     */
    protected $query;

    /**
     * @var SelectExecutor An Select Executor to the query.
     */
    private $selectExecutor;

    /**
     * @var InsertExecutor An Insert Executor to the query.
     */
    private $insertExecutor;

    /**
     * @var UpdateExecutor An Update Executor to the query.
     */
    private $updateExecutor;

    /**
     * @var DeleteExecutor An Delete Executor to the query.
     */
    private $deleteExecutor;

    /**
     * @var CreateTableExecutor An Create Table Executor to the query.
     */
    private $createTableExecutor;

    /**
     * @var CreateViewExecutor An Create View Executor to the query.
     */
    private $createViewExecutor;

    /**
     * @var CreateProcedureExecutor An Create Procedure Executor to the query.
     */
    private $createProcedureExecutor;

    /**
     * @var CreateFunctionExecutor An Create Function Executor to the query.
     */
    private $createFunctionExecutor;

    /**
     * @var CreateIndexExecutor An Create Index Executor to the query.
     */
    private $createIndexExecutor;

    /**
     * @var DropTableExecutor An Drop Table Executor to the query.
     */
    private $dropTableExecutor;

    /**
     * @var DropViewExecutor An Drop View Executor to the query.
     */
    private $dropViewExecutor;

    /**
     * @var DropProcedureExecutor An Drop Procedure Executor to the query.
     */
    private $dropProcedureExecutor;

    /**
     * @var DropFunctionExecutor An Drop Function Executor to the query.
     */
    private $dropFunctionExecutor;

    /**
     * @var DropIndexExecutor An Drop Index Executor to the query.
     */
    private $dropIndexExecutor;

    /**
     * @var ProcedureExecutor An Procedure Executor to the query.
     */
    private $procedureExecutor;

    /**
     * @var AnyExecutor An Any Executor to the query.
     */
    private $anyExecutor;

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
     * Gets the executor of the query.
     *
     * @return QueryExecutor
     */
    public function getExecutor()
    {
        $this->loadSelectExecutor();
        $this->loadInsertExecutor();
        $this->loadUpdateExecutor();
        $this->loadDeleteExecutor();

        $this->loadCreateTableExecutor();
        $this->loadCreateViewExecutor();
        $this->loadCreateProcedureExecutor();
        $this->loadCreateFunctionExecutor();
        $this->loadCreateIndexExecutor();

        $this->loadDropTableExecutor();
        $this->loadDropViewExecutor();
        $this->loadDropProcedureExecutor();
        $this->loadDropFunctionExecutor();
        $this->loadDropIndexExecutor();

        $this->loadProcedureExecutor();
        $this->loadAnyExecutor();

        if ($this->selectExecutor->queryMatch())
            return $this->selectExecutor;

        if ($this->insertExecutor->queryMatch())
            return $this->insertExecutor;

        if ($this->updateExecutor->queryMatch())
            return $this->updateExecutor;

        if ($this->deleteExecutor->queryMatch())
            return $this->deleteExecutor;

        if ($this->createTableExecutor->queryMatch())
            return $this->createTableExecutor;

        if ($this->createViewExecutor->queryMatch())
            return $this->createViewExecutor;

        if ($this->createProcedureExecutor->queryMatch())
            return $this->createProcedureExecutor;

        if ($this->createFunctionExecutor->queryMatch())
            return $this->createFunctionExecutor;

        if ($this->createIndexExecutor->queryMatch())
            return $this->createIndexExecutor;

        if ($this->dropTableExecutor->queryMatch())
            return $this->dropTableExecutor;

        if ($this->dropViewExecutor->queryMatch())
            return $this->dropViewExecutor;

        if ($this->dropProcedureExecutor->queryMatch())
            return $this->dropProcedureExecutor;

        if ($this->dropFunctionExecutor->queryMatch())
            return $this->dropFunctionExecutor;

        if ($this->dropIndexExecutor->queryMatch())
            return $this->dropIndexExecutor;

        if ($this->procedureExecutor->queryMatch())
            return $this->procedureExecutor;

        return $this->anyExecutor;
    }

    /**
     * Loads a Select Executor to the query.
     */
    private function loadSelectExecutor()
    {
        $this->selectExecutor = new SelectExecutor();
        $this->selectExecutor->setQuery($this->query);
    }

    /**
     * Loads a Insert Executor to the query.
     */
    private function loadInsertExecutor()
    {
        $this->insertExecutor = new InsertExecutor();
        $this->insertExecutor->setQuery($this->query);
    }

    /**
     * Loads a Update Executor to the query.
     */
    private function loadUpdateExecutor()
    {
        $this->updateExecutor = new UpdateExecutor();
        $this->updateExecutor->setQuery($this->query);
    }

    /**
     * Loads a Delete Executor to the query.
     */
    private function loadDeleteExecutor()
    {
        $this->deleteExecutor = new DeleteExecutor();
        $this->deleteExecutor->setQuery($this->query);
    }

    /**
     * Loads a Create Table Executor to the query.
     */
    private function loadCreateTableExecutor()
    {
        $this->createTableExecutor = new CreateTableExecutor();
        $this->createTableExecutor->setQuery($this->query);
    }

    /**
     * Loads a Create View Executor to the query.
     */
    private function loadCreateViewExecutor()
    {
        $this->createViewExecutor = new CreateViewExecutor();
        $this->createViewExecutor->setQuery($this->query);
    }

    /**
     * Loads a Create Procedure Executor to the query.
     */
    private function loadCreateProcedureExecutor()
    {
        $this->createProcedureExecutor = new CreateProcedureExecutor();
        $this->createProcedureExecutor->setQuery($this->query);
    }

    /**
     * Loads a Create Function Executor to the query.
     */
    private function loadCreateFunctionExecutor()
    {
        $this->createFunctionExecutor = new CreateFunctionExecutor();
        $this->createFunctionExecutor->setQuery($this->query);
    }

    /**
     * Loads a Create Index Executor to the query.
     */
    private function loadCreateIndexExecutor()
    {
        $this->createIndexExecutor = new CreateIndexExecutor();
        $this->createIndexExecutor->setQuery($this->query);
    }

    /**
     * Loads a Drop Table Executor to the query.
     */
    private function loadDropTableExecutor()
    {
        $this->dropTableExecutor = new DropTableExecutor();
        $this->dropTableExecutor->setQuery($this->query);
    }

    /**
     * Loads a Drop View Executor to the query.
     */
    private function loadDropViewExecutor()
    {
        $this->dropViewExecutor = new DropViewExecutor();
        $this->dropViewExecutor->setQuery($this->query);
    }

    /**
     * Loads a Drop Procedure Executor to the query.
     */
    private function loadDropProcedureExecutor()
    {
        $this->dropProcedureExecutor = new DropProcedureExecutor();
        $this->dropProcedureExecutor->setQuery($this->query);
    }

    /**
     * Loads a Drop Function Executor to the query.
     */
    private function loadDropFunctionExecutor()
    {
        $this->dropFunctionExecutor = new DropFunctionExecutor();
        $this->dropFunctionExecutor->setQuery($this->query);
    }

    /**
     * Loads a Drop Index Executor to the query.
     */
    private function loadDropIndexExecutor()
    {
        $this->dropIndexExecutor = new DropIndexExecutor();
        $this->dropIndexExecutor->setQuery($this->query);
    }

    /**
     * Loads a Procedure Executor to the query.
     */
    private function loadProcedureExecutor()
    {
        $this->procedureExecutor = new ProcedureExecutor();
        $this->procedureExecutor->setQuery($this->query);
    }

    /**
     * Loads a Any Executor to the query.
     */
    private function loadAnyExecutor()
    {
        $this->anyExecutor = new AnyExecutor();
        $this->anyExecutor->setQuery($this->query);
    }
}