<?php

namespace App\Http\Controllers;

use App\Business\Query\QueryRun;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function run(Request $request)
    {
    	$schemaName = $request->input('schema-name');
        $schemaCharset = $request->input('schema-charset');
        $query = $request->input('query');

        $queryRun = new QueryRun();
        $queryRun->setRequest($request);
        $queryRun->setSchemaName($schemaName);
        $queryRun->setSchemaCharset($schemaCharset);
        $queryRun->setQuery($query);

        return $queryRun->execute();
    }
}
