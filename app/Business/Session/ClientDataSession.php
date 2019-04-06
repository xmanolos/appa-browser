<?php

namespace App\Business\Session;

use App\Business\Session\SessionConstants;
use App\Business\Session\SessionProcessor;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

/**
 * Manages the client data in the session.
 *
 * @package App\Business\Session
 */
class ClientDataSession
{
    /**
     * @var Session The session that will be managed.
     */
    protected $session;

    /**
     * Defines the value of the sessions that will be managed.
     *
     * @param Session $session
     */
    public function setSession(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Defines the value of the session that will be managed from a Request.
     *
     * @param Request $request
     */
    public function fromRequest(Request $request)
    {
        $this->session = $request->session();
    }

    /**
     * Sets the selected schema of the session.
     *
     * @param string $schema
     */
    public function setSelectedSchema($schema)
    {
        $sessionProcessor = new SessionProcessor();
        $sessionProcessor->setSession($this->session);

        $sessionProcessor->set(SessionConstants::CLIENT_DATA_SELECTED_SCHEMA, $schema);
    }

    /**
     * Gets the selected schema from the session.
     *
     * @return string
     */
    public function getSelectedSchema()
    {
        $sessionProcessor = new SessionProcessor();
        $sessionProcessor->setSession($this->session);

        return $sessionProcessor->get(SessionConstants::CLIENT_DATA_SELECTED_SCHEMA);
    }

    /**
     * Removes the selected schema from the session.
     */
    public function removeSelectedSchema()
    {
        $sessionProcessor = new SessionProcessor();
        $sessionProcessor->setSession($this->session);

        $sessionProcessor->remove(SessionConstants::CLIENT_DATA_SELECTED_SCHEMA);
    }

    /**
     * Removes all Client Data from the session.
     */
    public function removeAll()
    {
        $this->removeSelectedSchema();
    }
}