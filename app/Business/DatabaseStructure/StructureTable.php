<?php

namespace App\Business\DatabaseStructure;

/**
 * A table of the database.
 *
 * @package App\Business\DatabaseStructure
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