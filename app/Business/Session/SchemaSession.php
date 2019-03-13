<?php

namespace App\Business\Session;

use App\Business\SessionValues;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

/**
 * Manages the data in Session of Schemas.
 *
 * @package App\Business\Session
 */
class SchemaSession
{
    /**
     * The request that requested the management.
     */
    protected $request;

    /**
     * Defines the value of the request that requested management.
     *
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Writes the value of Selected Schema in Session.
     */
    public function store()
    {
        $session = $this->request->session();
        $schema = $this->request->input('schema');

        SessionValues::set($session, 'selected-schema', $schema);
    }

    /**
     * Gets the value of Selected Schema in Session.
     *
     * @return string
     */
    public function load()
    {
        $session = $this->request->session();

        return SessionValues::get($session, 'selected-schema', '');
    }

    /**
     * Forget the value of Selected Schema in Session.
     *
     * @param Store $session
     */
    public static function forget($session)
    {
        SessionValues::forgetByKey($session, 'selected-schema');
    }
}