<?php

namespace App\Business;

use App\Business\DatabaseStructure\StructureColumn;
use App\Business\DatabaseStructure\StructureTable;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DatabaseDataBuilder
{
    public static function fromConnection($connection) 
    {
        $databaseTables = DatabaseDataBuilder::getTablesFromConnection($connection);

        $databaseData = new DatabaseData();
        $databaseData->setTables($databaseTables);

        return $databaseData;
    }

    private static function getTablesFromConnection($connection)
    {
        $tables = array();
        $sqlTables = $connection->select('SHOW TABLES');
        
        foreach ($sqlTables as $sqlTable) 
        {
            foreach ($sqlTable as $key => $value)
            {
                $columns = DatabaseDataBuilder::getTableColumnsFromConnection($connection, $value);

                $table = new StructureTable();
                $table->setName($value);
                $table->setColumns($columns);

                array_push($tables, $table);
            }
        }

        return $tables;
    }

    private static function getTableColumnsFromConnection($connection, $table)
    {
        $columns = array();
        $sqlColumns = $connection->getSchemaBuilder()->getColumnListing($table);
                
        foreach ($sqlColumns as $sqlColumn) 
        {
            $column = new StructureColumn();
            $column->setName($sqlColumn);

            array_push($columns, $column);    
        }

        return $columns;
    }
}
