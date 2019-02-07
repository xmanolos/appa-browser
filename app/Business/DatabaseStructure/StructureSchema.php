<?php

namespace App\Business\DatabaseStructure;

class StructureSchema
{
    public $name;
    public $tables;

    public function getName() { return $this->name; }
    public function getTables() { return $this->tables; }

    public function setName($name) { $this->name = $name; return $this; }
    public function setTables($tables) { $this->tables = $tables; return $this; }
}