<?php

namespace App\Business\DatabaseData;

use App\Business\Connection;
use Illuminate\Http\Request;

abstract class DatabaseData
{
    protected $request;
    protected $connection;

    public function setRequest(Request $request)
    {
        $this->request = $request;
        $this->connection = Connection::getInstance($request);
    }
}