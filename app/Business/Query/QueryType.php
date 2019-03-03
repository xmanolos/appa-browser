<?php

namespace App\Business\Query;

use App\Business\Query\Executor\AnyExecutor;
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
        $selectExecutor = new SelectExecutor();
        $selectExecutor->setRequest($this->request);
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