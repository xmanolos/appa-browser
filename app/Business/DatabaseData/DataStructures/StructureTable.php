<?php

namespace App\Business\DatabaseData\DataStructures;

/**
 * A table of the database.
 *
 * @package App\Business\DatabaseData\DataStructures
 */
class StructureTable
{
	/**
	 * The table name.
	 */
    public $name;

    /**
     * Gets the table name.
     *
     * @return string
     */
    public function getName()
    {
    	return $this->name;
    }

    /**
     * Defines the value of the table name.
     *
     * @param string $name
     */
    public function setName($name)
    {
    	$this->name = $name;
    }
}