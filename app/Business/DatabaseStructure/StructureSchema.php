<?php

namespace App\Business\DatabaseStructure;

/**
 * A schema of the database.
 *
 * @package App\Business\DatabaseStructure
 */
class StructureSchema
{
    /**
     * The schema name.
     */
    public $name;

    /**
     * The schema tables.
     */
    public $tables;

    /**
     * The schema views.
     */
    public $views;

    /**
     * The flag if the schema has usable content.
     */
    public $available; // TODO: Rename. "available" != "usable content".

    /**
     * Gets the schema name.
     * 
     * @return string
     */
    public function getName() 
    {
        return $this->name; 
    }

    /**
     * Gets the column tables.
     * 
     * @return array
     */
    public function getTables() 
    {   
        return $this->tables; 
    }

    /**
     * Gets the column views.
     * 
     * @return array
     */
    public function getViews() 
    { 
        return $this->views; 
    }

    /**
     * Gets the flag if the schema has usable content.
     *
     * @return array
     */
    public function getAvailable()
    {
        return $this->available;
    }
    
    /**
     * Defines the value of the schema name.
     * 
     * @param string $name
     */
    public function setName($name) 
    { 
        $this->name = $name;
    }
    
    /**
     * Defines the value of the schema tables.
     * 
     * @param array $tables
     */
    public function setTables($tables) 
    { 
        $this->tables = $tables; 
        $this->available = $this->isAvailable();
    }

    /**
     * Defines the value of the schema views.
     * 
     * @param array $views
     */
    public function setViews($views) 
    { 
        $this->views = $views; 
        $this->available = $this->isAvailable();
    }

    /**
     * Check if the schema has usable content.
     * 
     * @return boolean
     */
    protected function isAvailable() // TODO: Rename.
    { 
        return (count($this->tables) > 0 || count($this->views) > 0); 
    }
}