<?php

namespace App\Business;

use App\Business\Connection;
use App\Business\DatabaseStructure\StructureColumn;
use Illuminate\Http\Request;

class DatabaseData
{
    protected $request;

    public function setRequest(Request $request)
    {
    	$this->request = $request;
    }

    public function getSchemas()
    {
    	$connection = Connection::getInstance($this->request);
    	$schemas = $connection->select('SELECT SCHEMA_NAME AS schemaname FROM information_schema.SCHEMATA;');

    	sort($schemas);

    	return $schemas;
    }

    public function getTables()
    {
    	$connection = Connection::getInstance($this->request);
    	$schema = $this->request->input('schema');

    	return $connection->select("SELECT TABLE_NAME AS tablename FROM information_schema.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '$schema';");
    }

    public function getViews()
    {
    	$connection = Connection::getInstance($this->request);
    	$schema = $this->request->input('schema');

    	return $connection->select("SELECT TABLE_NAME AS viewname FROM information_schema.VIEWS WHERE TABLE_SCHEMA = '$schema';");
    }

    public function getColumns()
    {
    	$connection = Connection::getInstance($this->request);
    	$tableOrView = $this->request->input('tableOrView');

    	$columnsSql = $connection->getSchemaBuilder()->getColumnListing($tableOrView);
    	$columns = array();

    	foreach($columnsSql as $columnSql)
    	{
    		$columnDataType = $connection->getSchemaBuilder()->getColumnType($tableOrView, $columnSql);

            $column = new StructureColumn();
            $column->setName($columnSql);
            $column->setDataType($columnDataType);

            array_push($columns, $column);
    	}

    	return $columns;
    }
}