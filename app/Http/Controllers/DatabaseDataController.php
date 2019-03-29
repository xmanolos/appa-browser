<?php

namespace App\Http\Controllers;

use App\Business\DatabaseData;
use Illuminate\Http\Request;

class DatabaseDataController extends Controller
{
    public function getSchemas(Request $request)
    {
        $databaseData = new DatabaseData();
        $databaseData->setRequest($request);

        $schemas = $databaseData->getSchemas();

        return json_encode($schemas);
    }

    public function getTables(Request $request)
    {
    	$databaseData = new DatabaseData();
    	$databaseData->setRequest($request);

    	$tables = $databaseData->getTables();

    	return json_encode($tables);
    }

    public function getViews(Request $request)
    {
    	$databaseData = new DatabaseData();
    	$databaseData->setRequest($request);

    	$views = $databaseData->getViews();

    	return json_encode($views);
    }

    public function getRoutines(Request $request)
    {
        $databaseData = new DatabaseData();
        $databaseData->setRequest($request);

        $functions = $databaseData->getRoutines();

        return json_encode($functions);
    }

    public function getTableColumns(Request $request)
    {
        $databaseData = new DatabaseData();
        $databaseData->setRequest($request);

        $tableColumns = $databaseData->getTableColumns();

        return json_encode($tableColumns);
    }

    public function getTableConstraints(Request $request)
    {
        $databaseData = new DatabaseData();
        $databaseData->setRequest($request);

        $tableConstraints = $databaseData->getTableConstraints();

        return json_encode($tableConstraints);
    }

    public function getViewColumns(Request $request)
    {
    	$databaseData = new DatabaseData();
    	$databaseData->setRequest($request);

    	$viewColumns = $databaseData->getViewColumns();

    	return json_encode($viewColumns);
    }
}
