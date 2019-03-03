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
	 * The table columns.
	 */
    public $columns;
    
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
     * Gets the table columns.
     * 
     * @return array
     */
    public function getColumns() 
    { 
    	return $this->columns; 
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

 	/**
     * Defines the value of the table columns.
     * 
     * @param array $columns
     */
    public function setColumns($columns) 
    { 
    	$this->columns = $columns;
   	}
}