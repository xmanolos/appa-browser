<?php

namespace App\Business\Builders;

use App\Business\Connection;
use App\Business\DatabaseData;
use App\Business\DatabaseStructure\StructureColumn;
use App\Business\DatabaseStructure\StructureSchema;
use App\Business\DatabaseStructure\StructureTable;
use App\Business\DatabaseStructure\StructureView;
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

        usort($databaseSchemas, function($a, $b)  { return $b->getAvailable(); });

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
                $views = DatabaseDataBuilder::getViewsFromConnection($connection, $value);
                
                $schema = new StructureSchema();
                $schema->setName($value);
                $schema->setTables($tables);
                $schema->setViews($views);

                array_push($schemas, $schema);
            }
        }
        
        return $schemas;
    }

    private static function getTablesFromConnection($connection, $schema)
    {
        $tables = array();
        $sqlTables = $connection->select("SELECT TABLE_NAME AS TableName FROM information_schema.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '$schema';");
        
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

    private static function getViewsFromConnection($connection, $schema)
    {
        $views = array();
        $sqlViews = $connection->select("SELECT TABLE_NAME AS ViewName FROM information_schema.VIEWS WHERE TABLE_SCHEMA = '$schema';");
        
        foreach ($sqlViews as $sqlView) 
        {
            foreach ($sqlView as $key => $value)
            {
                $columns = DatabaseDataBuilder::getViewColumnsFromConnection($connection, $value);
                
                if (count($columns) < 1)
                    continue;

                $view = new StructureView();
                $view->setName($value);
                $view->setColumns($columns);

                array_push($views, $view);
            }
        }

        return $views;
    }

    private static function getViewColumnsFromConnection($connection, $view)
    {
        $columns = array();
        $sqlColumns = $connection->getSchemaBuilder()->getColumnListing($view);

        foreach ($sqlColumns as $sqlColumn) 
        {
            $columnDataType = $connection->getSchemaBuilder()->getColumnType($view, $sqlColumn);

            $column = new StructureColumn();
            $column->setName($sqlColumn);
            $column->setDataType($columnDataType);

            array_push($columns, $column);    
        
}        
        return $columns;
    }
}
