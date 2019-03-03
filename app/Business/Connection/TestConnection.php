<?php

namespace App\Business\Connection;

use App\Business\CapsuleConnection;
use App\Business\ConnectionConfig;

class TestConnection extends Connection
{
    public function execute()
    {
        $capsuleConnection = $this->getCapsuleConnection();

        $this->connection = $capsuleConnection->getTestConnection();
        $this->connection->getPdo();
    }
}