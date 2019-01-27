<?php

namespace App\Business;

class DatabaseData
{
    protected $tables;
    
    public function getTables() { return $this->tables; }

    public function setTables($tables) { $this->tables = $tables; return $this; }
}