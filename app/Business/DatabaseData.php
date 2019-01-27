<?php

namespace App\Business;

class DatabaseData
{
    protected $schemas;
    
    public function getSchemas() { return $this->schemas; }

    public function setSchemas($schemas) { $this->schemas = $schemas; return $this;  }

    public static function fromConnection($connection) {
        $connectionData = new ConnectionData();
        $connectionData->setDriver($requestDriver);
        $connectionData->setHost($requestHostname);
        $connectionData->setPort($requestPort);
        $connectionData->setUsername($requestUsername);
        $connectionData->setPassword($requestPassword);
        $connectionData->setDatabase($requestDatabase);
        
        return $connectionData;
    }
}