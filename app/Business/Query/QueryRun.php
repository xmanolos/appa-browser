<?php

namespace App\Business\Query;

use App\Business\Connection;
use App\Business\Query\Executor\DeleteExecutor;
use App\Business\Query\Executor\InsertExecutor;
use App\Business\Query\Executor\SelectExecutor;
use App\Business\Query\Executor\UpdateExecutor;
use App\Business\Query\QueryResponse;
use Illuminate\Http\Request;

class QueryRun
{
	protected $request;
	protected $query;

	public function setRequest(Request $request) { $this->request = $request; }
	public function setQuery($query) { $this->query = $query; }

    public function execute()
    {
        $queryExecutor = $this->getExecutor();
        $queryExecutor->execute();

        return $queryExecutor->getResponse();
    }

    public function getExecutor()
    {
    	$queryType = new QueryType();
    	$queryType->setRequest($this->request);
    	$queryType->setQuery($this->query);

    	return $queryType->getExecutor();
    }
}