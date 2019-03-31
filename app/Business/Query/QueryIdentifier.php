<?php

namespace App\Business\Query;

use App\Business\Query\Executors\AnyExecutor;
use App\Business\Query\Executors\DeleteExecutor;
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