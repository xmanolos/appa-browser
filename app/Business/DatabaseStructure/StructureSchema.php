<?php

namespace App\Business\DatabaseStructure;

class StructureSchema
{
    public $name;
    public $tables;
    public $views;
    public $available;

    public function getName() { return $this->name; }
    public function getTables() { return $this->tables; }
    public function getViews() { return $this->views; }
    
    public function setName($name) { $this->name = $name; return $this; }
    
    public function setTables($tables) 
    { 
        $this->tables = $tables; 
        $this->available = $this->getAvaiable();

        return $this; 
    }

    public function setViews($views) 
    { 
        $this->views = $views; 
        $this->available = $this->getAvaiable();
        
        return $this; 
    }

    public function getAvaiable() 
    { 
        return (count($this->tables) > 0 || count($this->views) > 0); 
    }
}