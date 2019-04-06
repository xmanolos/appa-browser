<?php

namespace App\Business\Connection;

use App\Business\CapsuleConnection;
use App\Business\ConnectionData\ConnectionData;

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
     * @var ConnectionData The Connection Data to define the connection.
     */
    protected $connectionData;

    /**
     * The connection instance.
     */
    protected $connection;

    /**
     * Defines the value of the Connection Data to define the connection.
     *
     * @param ConnectionData $connectionData
     */
    public function setConnectionData(ConnectionData $connectionData)
    {
        $this->connectionData= $connectionData;
    }

    /**
     * Gets an instance of Capsule Connection from the current Connection Config.
     * 
     * @return CapsuleConnection
     */
    protected function getCapsuleConnection()
    {
        $capsuleConnection = new CapsuleConnection();
        $capsuleConnection->setConnectionData($this->connectionData);

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