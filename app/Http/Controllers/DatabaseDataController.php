<?php

namespace App\Http\Controllers;

use App\Business\DatabaseData;
use Exception;
use Illuminate\Http\Request;

class DatabaseDataController extends Controller
{
    public function getSchemas(Request $request)
    {
        try
        {
            $databaseData = new DatabaseData();
            $databaseData->setRequest($request);

            $schemas = $databaseData->getSchemas();

            return response(json_encode($schemas), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getTables(Request $request)
    {
        try
        {
            $databaseData = new DatabaseData();
            $databaseData->setRequest($request);

            $tables = $databaseData->getTables();

            return response(json_encode($tables), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getViews(Request $request)
    {
        try
        {
            $databaseData = new DatabaseData();
            $databaseData->setRequest($request);

            $views = $databaseData->getViews();

            return response(json_encode($views), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getRoutines(Request $request)
    {
        try
        {
            $databaseData = new DatabaseData();
            $databaseData->setRequest($request);

            $functions = $databaseData->getRoutines();

            return response(json_encode($functions), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getTableColumns(Request $request)
    {
        try
        {
            $databaseData = new DatabaseData();
            $databaseData->setRequest($request);

            $tableColumns = $databaseData->getTableColumns();

            return response(json_encode($tableColumns), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getTableConstraints(Request $request)
    {
        try
        {
            $databaseData = new DatabaseData();
            $databaseData->setRequest($request);

            $tableConstraints = $databaseData->getTableConstraints();

            return response(json_encode($tableConstraints), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getViewColumns(Request $request)
    {
    	try
        {
            $databaseData = new DatabaseData();
            $databaseData->setRequest($request);

            $viewColumns = $databaseData->getViewColumns();

            return response(json_encode($viewColumns), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }
}
