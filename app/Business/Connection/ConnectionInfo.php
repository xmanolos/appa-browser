<?php

namespace App\Business\Connection;

use App\Business\ClientSession;
use App\Business\Session\ConnectionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Provides the data of the current connection of the client.
 *
 * @package App\Business\Connection
 */
class ConnectionInfo
{
	/**
	 * The request that requested the information.
	 */
    protected $request;

    /**
     * Defines the value of the request that requested the information.
     *
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
    	$this->request = $request;
    }

    /**
     * Get the info.
     */
    public function get()
    {
        $connectionSession = new ConnectionSession();
        $connectionSession->fromRequest($this->request);

        return $connectionSession->getInfo();
    }
}
