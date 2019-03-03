<?php

namespace App\Business\Connection;

/**
 * Connect to a database.
 *
 * @package App\Business\Connection
 */
class Connect extends Connection
{
	/**
	 * Sets the connection instance.
	 */
    public function execute()
    {
        $capsuleConnection = $this->getCapsuleConnection();

        $this->connection = $capsuleConnection->getConnection();
        $this->connection->getPdo();
    }
}