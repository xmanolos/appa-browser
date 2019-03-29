<?php

namespace App\Business\DatabaseStructure;

/**
 * A table of the database.
 *
 * @package App\Business\DatabaseStructure
 */
class StructureConstraint
{
	/**
	 * The table name.
	 */
    public $name;

    public $type;

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

    public function setType($type)
    {
        $this->type = $type;
    }
}