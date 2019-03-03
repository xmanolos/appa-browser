<?php

namespace App\Business\Connection;

/**
 * Tests the possibility of connecting to a database.
 *
 * @package App\Business\Connection
 */
class TestConnection extends Connection
{
	/**
	 * Sets the test connection instance.
	 */
    public function execute()
    {
        $capsuleConnection = $this->getCapsuleConnection();

        $this->connection = $capsuleConnection->getTestConnection();
        $this->connection->getPdo();
    }
}