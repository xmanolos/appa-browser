<?php

namespace App\Business\Query\Executor;

use App\Business\Connection;
use Illuminate\Http\Request;

abstract class QueryExecutor
{
    public $executorIdentifier;

    public $request;
    public $query;

    public function setRequest(Request $request) { $this->request = $request; }
    public function setQuery($query) { $this->query = $query; }

    public function getConnection() 
    {
        return Connection::getInstance($this->request);
    }

    public function queryMatch()
    {
        $queryUpperCase = strtoupper($this->query);
        
        return strpos($queryUpperCase, $this->executorIdentifier) === 0;
    }

    public function getResponse()
    {
        return $this->response;
    }
}