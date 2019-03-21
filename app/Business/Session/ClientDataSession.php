<?php

namespace App\Business\Session;

use Illuminate\Http\Request;

/**
 * Provides entries to handle the Client Data of the Session.
 *
 * @package App\Business\Session
 */
class ClientDataSession
{
    /**
     * @var string The Session that will be handled.
     */
    protected $session;

    /**
     * Defines the value of the Session that will be handled.
     *
     * @param mixed $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * Defines the value of the Session that will be handled from a Request.
     *
     * @param Request $request
     */
    public function fromRequest(Request $request)
    {
        $this->session = $request->session();
    }

    /**
     * Sets the Selected Schema of the Session.
     *
     * @param string $schema
     */
    public function setSelectedSchema($schema)
    {
        $clientSession = new Session();
        $clientSession->setSession($this->session);

        $clientSession->set('selected-schema', $schema); // TODO: Move to constants.
    }

    /**
     * Gets the Selected Schema from the Session.
     *
     * @return string
     */
    public function getSelectedSchema()
    {
        $clientSession = new Session();
        $clientSession->setSession($this->session);

        return $clientSession->get('selected-schema'); // TODO: Move to constants.
    }

    /**
     * Removes the Selected Schema from the Session.
     */
    public function removeSelectedSchema()
    {
        $clientSession = new Session();
        $clientSession->setSession($this->session);

        $clientSession->remove('selected-schema'); // TODO: Move to constants.
    }

    /**
     * Removes all Client Data from the Session.
     */
    public function removeAll()
    {
        $this->removeSelectedSchema();
    }
}