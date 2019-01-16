<?php

namespace App\Business\Databases;

use App\Business\Interfaces\IDatabase;

class MySQLDatabase implements IDatabase
{
    public function getDatabaseIdentifier()
    {
        return 'mysql';
    }

    public function getDatabaseDrive()
    {

    }

    public function getConnectionInstance($connectionData)
    {
        
    }
}