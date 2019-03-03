<?php

namespace App\Business\Connection;

use App\Business\CapsuleConnection;
use App\Business\ConnectionConfig;

abstract class Connection
{
    protected $connectionConfig;
    protected $connection;

    public function setConnectionConfig(ConnectionConfig $connectionConfig) { $this->connectionConfig = $connectionConfig; }

    public function getConnection() 
    { 
        return $this->connection; 
    }
    
    protected function getCapsuleConnection()
    {
        $capsuleConnection = new CapsuleConnection();
        $capsuleConnection->setConnectionConfig($this->connectionConfig);

        return $capsuleConnection;
    }
}