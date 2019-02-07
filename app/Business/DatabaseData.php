<?php

namespace App\Business;

class DatabaseData
{
    public $schemas;
    
    public function getSchemas() { return $this->schemas; }

    public function setSchemas($schemas) { $this->schemas = $schemas; return $this; }
}