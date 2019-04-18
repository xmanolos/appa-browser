<?php

namespace App\Business\DatabaseData;

use App\Business\DatabaseData\DataStructures\StructureColumn;

class DatabaseColumns extends DatabaseData
{
    public function getFromTable($schema, $table) // TODO: Schema!
    {
        $columns = array();

        $columnsResults = $this->connection->getSchemaBuilder()->getColumnListing($table);

        foreach($columnsResults as $columnResult)
        {
            $columnDataType = $this->connection->getSchemaBuilder()->getColumnType($table, $columnResult);

            $column = new StructureColumn();
            $column->setName($columnResult);
            $column->setDataType($columnDataType);

            array_push($columns, $column);
        }

        return $columns;
    }

    public function getFromView($schema, $view) // TODO: Schema!
    {
        $columns = array();

        $columnsResults = $this->connection->getSchemaBuilder()->getColumnListing($view);

        foreach($columnsResults as $columnResult)
        {
            $columnDataType = $this->connection->getSchemaBuilder()->getColumnType($view, $columnResult);

            $column = new StructureColumn();
            $column->setName($columnResult);
            $column->setDataType($columnDataType);

            array_push($columns, $column);
        }

        return $columns;
    }
}