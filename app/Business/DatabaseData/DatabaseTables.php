<?php

namespace App\Business\DatabaseData;

use App\Business\DatabaseData\DataStructures\StructureTable;

class DatabaseTables extends DatabaseData
{
    public function get($schema)
    {
        $tables = array();

        $query = "SELECT TABLE_NAME AS name FROM information_schema.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '$schema';";
        $tablesResults = $this->connection->select($query);

        sort($tablesResults);

        foreach($tablesResults as $tableResult)
        {
            $table = new StructureTable();
            $table->setName($tableResult->name);

            array_push($tables, $table);
        }

        return $tables;
    }
}