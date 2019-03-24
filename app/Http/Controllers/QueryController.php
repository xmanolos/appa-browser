<?php

namespace App\Http\Controllers;

use App\Business\Query\QueryProcessor;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function run(Request $request)
    {
    	$schemaName = $request->input('schema-name');
        $schemaCharset = $request->input('schema-charset');
        $query = $request->input('query');

        $queryProcessor = new QueryProcessor();
        $queryProcessor->setRequest($request);
        $queryProcessor->setSchemaName($schemaName);
        $queryProcessor->setSchemaCharset($schemaCharset);
        $queryProcessor->setQuery($query);

        $queryProcessor->execute();

        return $queryProcessor->getResponse();
    }
}
