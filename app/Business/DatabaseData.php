<?php

namespace App\Business;

use App\Business\Connection;
use App\Business\DatabaseStructure\StructureColumn;
use App\Business\DatabaseStructure\StructureConstraint;
use App\Business\DatabaseStructure\StructureSchema;
use App\Business\DatabaseStructure\StructureTable;
use App\Business\DatabaseStructure\StructureView;
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

        $schemasSql = $connection->select('SELECT SCHEMA_NAME AS name, default_character_set_name AS charset FROM information_schema.SCHEMATA;');
        $schemas = array();

        sort($schemasSql);

        foreach($schemasSql as $schemaSql)
        {
            $schemaCharset = $schemaSql->charset == null ? 'utf8' : $schemaSql->charset;

            $schema = new StructureSchema();
            $schema->setName($schemaSql->name);
            $schema->setCharset($schemaCharset);

            array_push($schemas, $schema);
        }

        return $schemas;
    }

    public function getTables()
    {
    	$connection = Connection::getInstance($this->request);
    	$schema = $this->request->input('schema');

        $tablesSql = $connection->select("SELECT TABLE_NAME AS name FROM information_schema.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA = '$schema';");
        $tables = array();

        sort($tablesSql);

        foreach ($tablesSql as $tableSql)
        {
            $table = new StructureTable();
            $table->setName($tableSql->name);

            array_push($tables, $table);
        }

        return $tables;
    }

    public function getViews()
    {
    	$connection = Connection::getInstance($this->request);
    	$schema = $this->request->input('schema');

    	$viewsSql = $connection->select("SELECT TABLE_NAME AS name FROM information_schema.VIEWS WHERE TABLE_SCHEMA = '$schema';");
        $views = array();

        sort($viewsSql);

        foreach ($viewsSql as $viewSql)
        {
            $view = new StructureView();
            $view->setName($viewSql->name);

            array_push($views, $view);
        }

        return $views;
    }

    public function getRoutines()
    {
        $connection = Connection::getInstance($this->request);
        $schema = $this->request->input('schema');

        $routinesSql = $connection->select("SELECT ROUTINE_NAME AS name FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = '$schema';");
        $routines = array();

        sort($routinesSql);

        foreach ($routinesSql as $routineSql) {
            $routine = new StructureView();
            $routine->setName($routineSql->name);

            array_push($routines, $routine);
        }

        return $routines;
    }

    public function getTableColumns()
    {
        $connection = Connection::getInstance($this->request);
        $table = $this->request->input('table');

        $columnsSql = $connection->getSchemaBuilder()->getColumnListing($table);
        $columns = array();
        
        foreach($columnsSql as $columnSql)
        {
            $columnDataType = $connection->getSchemaBuilder()->getColumnType($table, $columnSql);

            $column = new StructureColumn();
            $column->setName($columnSql);
            $column->setDataType($columnDataType);

            array_push($columns, $column);
        }

        return $columns;
    }

    public function getTableConstraints()
    {
        $connection = Connection::getInstance($this->request);
        $schema = $this->request->input('schema');
        $table = $this->request->input('table');
        
        $constraintsSql = $connection->select("SELECT CONSTRAINT_NAME AS name, CONSTRAINT_TYPE AS type FROM information_schema.TABLE_CONSTRAINTS WHERE CONSTRAINT_SCHEMA = '$schema' AND TABLE_NAME = '$table' AND CONSTRAINT_TYPE IN ('PRIMARY KEY', 'FOREIGN KEY');");
        $constraints = array();

        foreach($constraintsSql as $constraintSql)
        {
            $constraint = new StructureConstraint();
            $constraint->setName($constraintSql->name);
            $constraint->setType($constraintSql->type);

            array_push($constraints, $constraint);
        }

        return $constraints;
    }

    public function getViewColumns()
    {
    	$connection = Connection::getInstance($this->request);
    	$view = $this->request->input('view');

    	$columnsSql = $connection->getSchemaBuilder()->getColumnListing($view);
    	$columns = array();

    	foreach($columnsSql as $columnSql)
    	{
    		$columnDataType = $connection->getSchemaBuilder()->getColumnType($view, $columnSql);

            $column = new StructureColumn();
            $column->setName($columnSql);
            $column->setDataType($columnDataType);

            array_push($columns, $column);
        }

        return $columns;
    }
}