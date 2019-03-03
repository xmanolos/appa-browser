<?php

namespace App\Business\DatabaseStructure;

/**
 * A view of the database.
 *
 * @package App\Business\DatabaseStructure
 */
class StructureView
{
	/**
	 * The view name.
	 */
    public $name;

    /**
	 * The view columns.
	 */
    public $columns;
    
    /**
     * Gets the view name.
     * 
     * @return string
     */
    public function getName() 
    { 
    	return $this->name; 
    }

    /**
     * Gets the view columns.
     * 
     * @return array
     */
    public function getColumns() 
    { 
    	return $this->columns; 
    }

    /**
     * Defines the value of the view name.
     * 
     * @param string $name
     */
    public function setName($name) 
    { 
    	$this->name = $name;
 	}

 	/**
     * Defines the value of the view columns.
     * 
     * @param array $columns
     */
    public function setColumns($columns) 
    { 
    	$this->columns = $columns;
   	}
}