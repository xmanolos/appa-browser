<?php

namespace App\Http\Controllers;

use App\Business\DatabaseData\DatabaseColumns;
use App\Business\DatabaseData\DatabaseConstraints;
use App\Business\DatabaseData\DatabaseRoutines;
use App\Business\DatabaseData\DatabaseSchemas;
use App\Business\DatabaseData\DatabaseTables;
use App\Business\DatabaseData\DatabaseTriggers;
use App\Business\DatabaseData\DatabaseViews;
use Exception;
use Illuminate\Http\Request;

class DatabaseDataController extends Controller
{
    public function getSchemas(Request $request)
    {
        try
        {
            $databaseData = new DatabaseSchemas();
            $databaseData->setRequest($request);

            $schemas = $databaseData->get();

            return response(json_encode($schemas), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getTables(Request $request)
    {
        $schema = $request->input('schema');

        try
        {
            $databaseData = new DatabaseTables();
            $databaseData->setRequest($request);

            $tables = $databaseData->get($schema);

            return response(json_encode($tables), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getViews(Request $request)
    {

        $schema = $request->input('schema');

        try
        {
            $databaseData = new DatabaseViews();
            $databaseData->setRequest($request);

            $views = $databaseData->get($schema);

            return response(json_encode($views), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getRoutines(Request $request)
    {
        $schema = $request->input('schema');

        try
        {
            $databaseData = new DatabaseRoutines();
            $databaseData->setRequest($request);

            $functions = $databaseData->get($schema);

            return response(json_encode($functions), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getTableColumns(Request $request)
    {
        $schema = $request->input('schema');
        $table = $request->input('table');

        try
        {
            $databaseData = new DatabaseColumns();
            $databaseData->setRequest($request);

            $tableColumns = $databaseData->getFromTable($schema, $table);

            return response(json_encode($tableColumns), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getTableConstraints(Request $request)
    {
        $schema = $request->input('schema');
        $table = $request->input('table');

        try
        {
            $databaseData = new DatabaseConstraints();
            $databaseData->setRequest($request);

            $tableConstraints = $databaseData->get($schema, $table);

            return response(json_encode($tableConstraints), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getTableTriggers(Request $request)
    {
        $schema = $request->input('schema');
        $table = $request->input('table');

        try
        {
            $databaseData = new DatabaseTriggers();
            $databaseData->setRequest($request);

            $tableColumns = $databaseData->get($schema, $table);

            return response(json_encode($tableColumns), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }

    public function getViewColumns(Request $request)
    {
        $schema = $request->input('schema');
        $table = $request->input('table');

        try
        {
            $databaseData = new DatabaseColumns();
            $databaseData->setRequest($request);

            $viewColumns = $databaseData->getFromView($schema, $table);

            return response(json_encode($viewColumns), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }
}
