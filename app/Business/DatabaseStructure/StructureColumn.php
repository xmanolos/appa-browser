<?php

namespace App\Business\DatabaseStructure;

class StructureColumn
{
    protected $name;

    public function getName() { return $this->name; }

    public function setName($name) { $this->name = $name; return $this; }
}