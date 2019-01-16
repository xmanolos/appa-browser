<?php

namespace App\Business\Databases;

use App\Business\Interfaces\IDatabase;

class PostgreSQLDatabase implements IDatabase
{
    public function getDatabaseIdentifier()
    {
        return 'pgsql';
    }

    public function getDatabaseDrive()
    {

    }

    public function getDatabaseInstance($connectionData)
    {
        
    }
}