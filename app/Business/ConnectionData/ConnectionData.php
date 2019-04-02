<?php

namespace App\Business\ConnectionData;

class ConnectionData
{
    public $driver;
    public $host;
    public $port;
    public $username;
    public $password;
    public $database;

    public function getArray()
    {
        return (array) $this;
    }
}