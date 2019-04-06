<?php

namespace App\Business\Session;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

/**
 * Provides entries to handle the session.
 *
 * @package App\Business
 */
class SessionProcessor
{
    /**
     * @var Session The session that will be handled.
     */
    protected $session;

    /**
     * Defines the value of the session that will be handled.
     *
     * @param Session $session
     */
    public function setSession(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Defines the value of the session that will be handled from a request.
     * 
     * @param Request $request
     */
    public function fromRequest(Request $request)
    {
        $this->session = $request->session();
    }

    /**
     * Adds a new set to the session.
     * 
     * @param string $key
     * @param mixed $value
     */
    public function add($key, $value)
    {
        $this->session->put($key, $value);
    }

    /**
     * Gets the value of a session set from the key.
     * If there is no set with this key the default value is returned.
     *
     * @param string $key
     * @param mixed $default [optional] [default = null]
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if ($this->session->has($key))
            return $this->session->get($key);
                
        return $default;
    }

    /**
     * Sets the value of a session set from the key.
     * 
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        if ($this->session->has($key))
            $this->session->remove($key);
                
        $this->session->put($key, $value);
    }

    /**
     * Remove a set from the session from the key.
     * If there is no set with this key nothing happens.
     *
     * @param string $key
     */
    public function remove($key)
    {
        if ($this->session->has($key))
            $this->session->remove($key);
    }
}
