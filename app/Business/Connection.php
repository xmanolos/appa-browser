<?php

namespace App\Business;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Connection
{
    protected $identifier;
    protected $connection;

    protected $connections;

    function __construct() {
        $this->identifier = 'custom-connection';
        $this->connections = Config::get('database')['connections'];
    }

    public function create($connectionData)
    {
        $alreadyExists = $this->alreadyExists();
        
        if (!$alreadyExists) {
            $connection = $this->getConnection($connectionData);

            Config::set('database.connections.' . $this->identifier, $connection);
        }
        
        $this->connection = DB::Connection($this->identifier);
    }

    private function alreadyExists()
    {
        return isset($this->connections[$this->identifier]);
    }

    private function getConnection($connectionData)
    {
        $connection = array();
        $connection['driver'] = $connectionData->getDriver();
        $connection['host'] = $connectionData->getHost();
        $connection['port'] = $connectionData->getPort();
        $connection['username'] = $connectionData->getUsername();
        $connection['password'] = $connectionData->getPassword();  
        $connection['database'] = $connectionData->getDatabase();  

        return $connection;
    }

    public function getInstance()
    {
        return $this->connection;
    }
}
