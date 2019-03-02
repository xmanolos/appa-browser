<?php

namespace App\Business;

use App\Business\ConnectionConfig;
use Illuminate\Database\Capsule\Manager as Capsule;

class CapsuleConnection
{
    protected $connectionConfig;

    public function setConnectionConfig(ConnectionConfig $connectionConfig)  { $this->connectionConfig = $connectionConfig; }

    public function getTestConnection()
    {
        $capsule = new Capsule;
        $capsule->addConnection($this->connectionConfig->get(), 'client-connection-test');

        return $capsule->getConnection('client-connection-test');	
    }

    public function getConnection()
    {
        $capsule = new Capsule;
        $capsule->addConnection($this->connectionConfig->get(), 'client-connection');
        $capsule->bootEloquent();
        $capsule->setAsGlobal();
        
        return $capsule->getConnection('client-connection');   
    }
}