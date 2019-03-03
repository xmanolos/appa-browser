<?php

namespace App\Business\Connection;

use App\Business\CapsuleConnection;
use App\Business\ConnectionConfig;

/**
 * @package App\Business\Connection
 */
abstract class Connection
{
    /**
     * The Connection Config to define the connection.
     */
    protected $connectionConfig;

    /**
     * The connection instance.
     */
    protected $connection;

    /**
     * Defines the value of the Connection Config to define the connection.
     * 
     * @param ConnectionConfig $connectionConfig
     */
    public function setConnectionConfig(ConnectionConfig $connectionConfig) 
    { 
        $this->connectionConfig = $connectionConfig; 
    }

    /**
     * Gets an instance of Capsule Connection from the current Connection Config.
     * 
     * @return CapsuleConnection
     */
    protected function getCapsuleConnection()
    {
        $capsuleConnection = new CapsuleConnection();
        $capsuleConnection->setConnectionConfig($this->connectionConfig);

        return $capsuleConnection;
    }

    /**
     * Gets the connection instance.
     * 
     * @return Connect
     */
    public function getConnection() 
    { 
        return $this->connection; 
    }
}