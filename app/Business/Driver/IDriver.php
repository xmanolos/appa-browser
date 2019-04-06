<?php

namespace App\Business\Driver;

/**
 * Model of a Driver.
 *
 * @package App\Business\Driver
 */
interface IDriver
{
    /**
     * Gets the identifier of the Driver.
     *
     * @return string
     */
	public function getIdentifier();

    /**
     * Gets the name of the Driver.
     *
     * @return string
     */
	public function getName();

    /**
     * Gets the icon file path of the Driver.
     *
     * @return string
     */
	public function getIconFilePath();
}