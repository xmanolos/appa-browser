<?php

namespace App\Business\DatabaseData\DataStructures;

/**
 * A column of a table or view of the database.
 *
 * @package App\Business\DatabaseData\DataStructures
 */
class StructureTrigger
{
	/**
	 * The column name.
	 */
    public $name;

    /**
     * Gets the column name.
     * 
     * @return string
     */
    public function getName() 
    { 
    	return $this->name; 
    }

    /**
     * Defines the value of the column name.
     * 
     * @param string $name
     */    
    public function setName($name) 
    { 
        $this->name = $name; 
    }
}