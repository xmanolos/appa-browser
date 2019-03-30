<?php

namespace App\Business\Driver\Drivers;

use App\Business\Driver\IDriver;

class PostgresSqlDriver implements IDriver
{
    public function getIdentifier()
    {
    	return 'pgsql';
    }

    public function getName() 
    {
    	return 'PostgresSQL';
    }

    public function getIconFilePath() 
    {
    	return 'images/drivers/pgsql.svg';
    }
}