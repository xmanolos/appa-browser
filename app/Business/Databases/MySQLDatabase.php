<?php

namespace App\Business\Databases;

use App\Business\Interfaces\IConnection;

class MySQLDatabase implements IConnection
{
    public function getConnectionIdentifier()
    {
        return 'mysql';
    }

    public function getConnectionDrive()
    {

    }

    public function getConnectionInstance($connectionData)
    {
        
    }
}