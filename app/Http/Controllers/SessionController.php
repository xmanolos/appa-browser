<?php

namespace App\Http\Controllers;

use App\Business\Session\SchemaSession;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function storeSchema(Request $request)
    {
        $schemaSession = new SchemaSession();
        $schemaSession->setRequest($request);
        $schemaSession->store();
    }

    public function loadSchema(Request $request)
    {
        $schemaSession = new SchemaSession();
        $schemaSession->setRequest($request);
        $schema = $schemaSession->load();

        return json_encode($schema);
    }
}