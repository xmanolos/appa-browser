<?php

namespace App\Http\Controllers;

use App\Business\Builders\DatabaseDataBuilder;
use App\Business\DatabaseData2;
use Illuminate\Http\Request;

class DatabaseDataController extends Controller
{
    public function getSchemas(Request $request)
    {
        $databaseData2 = new DatabaseData2();
        $databaseData2->setRequest($request);
        
        $schemas = $databaseData2->getSchemas();

        return json_encode($schemas);
    }

    public function getTables(Request $request)
    {
    	$databaseData2 = new DatabaseData2();
    	$databaseData2->setRequest($request);

    	$tables = $databaseData2->getTables();
    	
    	return json_encode($tables);
    }

    public function getViews(Request $request)
    {
    	$databaseData2 = new DatabaseData2();
    	$databaseData2->setRequest($request);

    	$views = $databaseData2->getViews();

    	return json_encode($views);
    }

    public function getColumns(Request $request)
    {
    	$databaseData2 = new DatabaseData2();
    	$databaseData2->setRequest($request);

    	$columns = $databaseData2->getColumns();

    	return json_encode($columns);
    }
}
