<?php

namespace App\Business\Query\Executor;

use App\Business\Connection;
use Illuminate\Http\Request;

abstract class QueryExecutor
{
    public $executorIdentifier = 'ANY';

    public $request;
    public $query;
    public $connection;

    public function __construct(Request $request, $query)
    {
        $this->request = $request;
        $this->query = trim($query);
        $this->connection = Connection::getInstance($request);
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