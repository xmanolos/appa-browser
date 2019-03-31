<?php

namespace App\Business\Query;

/**
 * A Executor for a type of Query.
 *
 * @package App\Business\Interfaces
 */
interface IQueryExecutor 
{
    /**
     * Gets the Query Type keyword.
     *
     * @return string
     */
    public function getTypeKeyword();

    /**
     * Executes Query and sets the response of execution.
     */
	public function execute();
}