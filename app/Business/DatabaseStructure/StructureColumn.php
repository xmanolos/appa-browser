<?php

namespace App\Business\DatabaseStructure;

/**
 * A column of a table or view of the database.
 *
 * @package App\Business\DatabaseStructure
 */
class StructureColumn
{
	/**
	 * The column name.
	 */
    public $name;

    /**
     * The column data type.
     */
    public $dataType;

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
     * Gets the column data type.
     * 
     * @return string
     */
    public function getDataType() 
    { 
    	return $this->dataType; 
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

    /**
     * Defines the value of the column data type.
     * 
     * @param string $dataType
     */
    public function setDataType($dataType) 
    { 
        $this->dataType = $dataType; 
    }
}