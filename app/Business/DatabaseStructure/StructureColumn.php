<?php

namespace App\Business\DatabaseStructure;

class StructureColumn
{
    public $name;
    public $dataType;

    public function getName() { return $this->name; }
    public function getDataType() { return $this->dataType; }

    public function setName($name) { $this->name = $name; return $this; }
    public function setDataType($dataType) { $this->dataType = $dataType; return $this; }
}