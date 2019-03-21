<?php

namespace App\Business\Connection;

use App\Business\Session\ConnectionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Undoes the current state of connection to the database.
 *
 * @package App\Business\Connection
 */
class Disconnect
{
	/**
	 * The request that requested the disconnection.
	 */
    protected $request;

    /**
     * Defines the value of the request that requested the disconnection.
     * 
     * @param Request $request
     */
    public function setRequest(Request $request) 
    { 
    	$this->request = $request; 
    }
    
    /**
     * Disconnect the client.
     */
    public function execute()
    {
        $connectionSession = new ConnectionSession();
        $connectionSession->fromRequest($this->request);

        $connectionSession->remove();

        DB::purge('custom-connection'); // TODO: Try use Capsule. // TODO: Move to constants.
    }
}