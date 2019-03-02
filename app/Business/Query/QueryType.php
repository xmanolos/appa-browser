<?php

namespace App\Business\Query;

use App\Business\Query\Executor\DeleteExecutor;
use App\Business\Query\Executor\InsertExecutor;
use App\Business\Query\Executor\SelectExecutor;
use App\Business\Query\Executor\UpdateExecutor;
use Illuminate\Http\Request;

class QueryType
{
	protected $request;
	protected $query;

	public function setRequest(Request $request)  { $this->request = $request; }
	public function setQuery($query) { $this->query = $query; }

    public function getExecutor()
    {
        $selectExecutor = new SelectExecutor($this->request, $this->query);
        $insertExecutor = new InsertExecutor($this->request, $this->query);
        $updateExecutor = new UpdateExecutor($this->request, $this->query);
        $deleteExecutor = new DeleteExecutor($this->request, $this->query);

        if ($selectExecutor->queryMatch()) return $selectExecutor;
        if ($insertExecutor->queryMatch()) return $insertExecutor; 
        if ($updateExecutor->queryMatch()) return $updateExecutor;
        if ($deleteExecutor->queryMatch()) return $deleteExecutor;

        // TODO: Null? Any!
        return null;
    }
}