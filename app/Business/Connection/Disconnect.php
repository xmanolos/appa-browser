<?php

namespace App\Business\Connection;

use App\Business\ClientSession;
use Illuminate\Http\Request;

class Disconnect
{
    protected $request;

    public function setRequest(Request $request)  { $this->request = $request; }

    public function execute()
    {
        $clientSession = new ClientSession();
        $clientSession->setRequest($request);
    	$clientSession->forgetConnection();

        DB::purge('custom-connection');
    }
}