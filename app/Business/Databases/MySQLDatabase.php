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

    public function getDatabaseInstance($connectionData)
    {
        $config = Config::get('database');
        $databases = $config['connections'];

        if (!isset($databases['ec'])) {
            $connection = array();
            $connection['driver'] = $connectionData->$driver;
            $connection['host'] = $connectionData->$host;
            $connection['port'] = $connectionData->$port;
            $connection['username'] = $connectionData->$login;
            $connection['password'] = $connectionData->$password;  

            Config::set('database.connections.' . 'ec', $connection);
        }

        return DB::Connection('ec');
    }
}