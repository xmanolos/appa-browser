<?php

namespace App\Business\Databases;

use App\Business\Interfaces\IConnection;

class PostgreSQLDatabase implements IConnection
{
    public function getConnectionIdentifier()
    {
        return 'pgsql';
    }

    public function getConnectionDrive()
    {

    }

    public function getConnectionInstance($connectionData)
    {
        
    }
}