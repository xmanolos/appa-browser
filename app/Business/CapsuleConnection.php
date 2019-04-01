<?php

namespace App\Business;

use App\Business\ConnectionData\ConnectionData;
use Illuminate\Database\Capsule\Manager as Capsule;

class CapsuleConnection
{
    protected $connectionData;

    public function setConnectionData(ConnectionData $connectionData)
    {
        $this->connectionData = $connectionData;
    }

    public function getTestConnection()
    {
        $capsule = new Capsule;
        $capsule->addConnection($this->connectionData->getArray(), 'client-connection-test');

        return $capsule->getConnection('client-connection-test');	
    }

    public function getConnection()
    {
        $capsule = new Capsule;
        $capsule->addConnection($this->connectionData->getArray(), 'client-connection');
        $capsule->bootEloquent();
        $capsule->setAsGlobal();
        
        return $capsule->getConnection('client-connection');   
    }
}