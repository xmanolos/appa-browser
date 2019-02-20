<?php

namespace App\Business\Builders;

use App\Business\DatabaseStructure\StructureColumn;
use App\Business\DatabaseStructure\StructureSchema;
use App\Business\DatabaseStructure\StructureTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DatabaseDataBuilder
{
    // TODO: Rename method.
    public static function fromConnection(Request $request) 
    {
        $connection = Connection::getInstance($request);
        $databaseSchemas = DatabaseDataBuilder::getSchemasFromConnection($connection);
        
        $databaseData = new DatabaseData();
        $databaseData->setSchemas($databaseSchemas);
        
        return $databaseData;
    }

    private static function getSchemasFromConnection($connection)
    {
        $schemas = array();
        $sqlSchemas = $connection->select('SELECT SCHEMA_NAME AS SchemaName FROM information_schema.SCHEMATA;');
        
        foreach ($sqlSchemas as $sqlSchema) 
        {
            foreach ($sqlSchema as $key => $value)
            {
                $tables = DatabaseDataBuilder::getTablesFromConnection($connection, $value);
                
                $schema = new StructureSchema();
                $schema->setName($value);
                $schema->setTables($tables);

                array_push($schemas, $schema);
            }
        }
        
        return $schemas;
    }

    private static function getTablesFromConnection($connection, $schema)
    {
        $tables = array();
        $sqlTables = $connection->select("SELECT TABLE_NAME AS TableName FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$schema';");
        
        foreach ($sqlTables as $sqlTable) 
        {
            foreach ($sqlTable as $key => $value)
            {
                $columns = DatabaseDataBuilder::getTableColumnsFromConnection($connection, $value);
                
                if (count($columns) < 1)
                    continue;

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
            $columnDataType = $connection->getSchemaBuilder()->getColumnType($table, $sqlColumn);

            $column = new StructureColumn();
            $column->setName($sqlColumn);
            $column->setDataType($columnDataType);

            array_push($columns, $column);    
        }
        
        return $columns;
    }
}
