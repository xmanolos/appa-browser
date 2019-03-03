<?php

namespace App\Business\Connection;

use App\Business\ClientSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Disconnect
{
    protected $request;

    public function setRequest(Request $request)  { $this->request = $request; }

    public function execute()
    {
        $clientSession = new ClientSession();
        $clientSession->setRequest($this->request);
    	$clientSession->forgetConnection();

        DB::purge('custom-connection');
    }
}