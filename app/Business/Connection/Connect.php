<?php

namespace App\Business\Connection;

use App\Business\CapsuleConnection;
use App\Business\ConnectionConfig;

class Connect extends Connection
{
    public function execute()
    {
        $capsuleConnection = $this->getCapsuleConnection();

        $this->connection = $capsuleConnection->getConnection();
        $this->connection->getPdo();
    }
}