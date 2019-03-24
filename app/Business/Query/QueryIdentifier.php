<?php

namespace App\Business\Query;

use App\Business\Query\Executor\AnyExecutor;
use App\Business\Query\Executor\DeleteExecutor;
use App\Business\Query\Executor\InsertExecutor;
use App\Business\Query\Executor\QueryExecutor;
use App\Business\Query\Executor\SelectExecutor;
use App\Business\Query\Executor\UpdateExecutor;

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
        $this->loadAnyExecutor();

        if ($this->selectExecutor->queryMatch())
            return $this->selectExecutor;

        if ($this->insertExecutor->queryMatch())
            return $this->insertExecutor;

        if ($this->updateExecutor->queryMatch())
            return $this->updateExecutor;

        if ($this->deleteExecutor->queryMatch())
            return $this->deleteExecutor;

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
     * Loads a Any Executor to the query.
     */
    private function loadAnyExecutor()
    {
        $this->anyExecutor = new AnyExecutor();
        $this->anyExecutor->setQuery($this->query);
    }
}