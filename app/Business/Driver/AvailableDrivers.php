<?php

namespace App\Business\Driver;

class AvailableDrivers
{
    private static $instance;

    /**
     * @var array Set of registered Drivers.
     */
    private static $drivers;

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new AvailableDrivers();

        return self::$instance;
    }

    /**
     * Adds a new Driver to the set of registered Drivers.
     *
     * @param IDriver $driver
     */
    public static function register(IDriver $driver)
    {
        if (!self::$drivers)
            self::$drivers = [];

        $driver->identifier = $driver->getIdentifier();
        $driver->name = $driver->getName();
        $driver->iconFilePath = $driver->getIconFilePath();
        
        array_push(self::$drivers, $driver);
    }

    /**
     * Adds a new Driver to the set of registered Drivers from the class/namespace.
     *
     * @param string $driverClass
     */
    public static function registerFromClass($driverClass)
    {
        $driver = new $driverClass;

        self::register($driver);
    }

    /**
     * Gets the set of registered Drivers.
     *
     * @return array
     */
    public static function getAll()
    {
        return self::$drivers;
    }

    /**
     * Gets a Driver from the set of registered Drivers from the identifier.
     *
     * @param string $identifier
     * @return IDriver
     */
    public static function getFromIdentifier($identifier)
    {
        $drivers = self::getAll();

        foreach ($drivers as $driver)
        {
            if ($driver->identifier == $identifier)
                return $driver;
        }

        return null;
    }
}