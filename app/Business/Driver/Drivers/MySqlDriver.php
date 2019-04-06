<?php

namespace App\Business\Driver\Drivers;

use App\Business\Driver\IDriver;

/**
 * Driver model for MySQL.
 *
 * @implements IDriver
 * @package App\Business\Driver\Drivers
 */
class MySqlDriver implements IDriver
{
    /**
     * Gets the identifier of the MySQL Driver.
     *
     * @return string
     */
    public function getIdentifier() 
    {
		return 'mysql';
    }

    /**
     * Gets the name of the MySQL Driver.
     *
     * @return string
     */
    public function getName() 
    {
		return 'MySQL';
    }

    /**
     * Gets the icon file path of the MySQL Driver.
     *
     * @return string
     */
    public function getIconFilePath() 
    {
		return 'images/drivers/mysql.svg';
    }
}