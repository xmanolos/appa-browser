<?php

namespace App\Http\Controllers;

use App\Business\Session\ClientDataSession;
use App\Business\Session\SessionConstants;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function storeSelectedSchema(Request $request)
    {
        $selectedSchema = $request->input(SessionConstants::CLIENT_DATA_SELECTED_SCHEMA);

        $clientDataSession = new ClientDataSession();
        $clientDataSession->fromRequest($request);

        $clientDataSession->setSelectedSchema($selectedSchema);
    }

    public function loadSelectedSchema(Request $request)
    {
        $clientDataSession = new ClientDataSession();
        $clientDataSession->fromRequest($request);

        $selectedSchema = $clientDataSession->getSelectedSchema();

        return json_encode($selectedSchema);
    }
}