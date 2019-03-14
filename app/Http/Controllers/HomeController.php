<?php

namespace App\Http\Controllers;

use App\Business\ClientSession;
use App\Business\Connection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $clientSession = new ClientSession();
        $clientSession->setRequest($request);

    	if (!$clientSession->isConnected())
            return \redirect(route('connect'));

        $connectionInfo = $this->getConnectionInfo($clientSession);
    	return \view(
            'home',
            [
                'connectionInfo' => $connectionInfo
            ]
        );


    }

    public function getConnectionInfo($clientSession) {
        $connectInfo = $clientSession->getInfo();
        return $connectInfo['hostname'] . ':' . $connectInfo['port'];
    }
}
