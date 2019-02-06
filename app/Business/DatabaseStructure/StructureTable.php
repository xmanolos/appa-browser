<?php

namespace App\Business\DatabaseStructure;

class StructureTable
{
    public $name;
    public $columns;

    public function getName() { return $this->name; }
    public function getColumns() { return $this->columns; }

    public function setName($name) { $this->name = $name; return $this; }
    public function setColumns($columns) { $this->columns = $columns; return $this; }
}