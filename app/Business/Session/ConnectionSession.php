<?php

namespace App\Business\Session;

use App\Business\Connection\Connect;
use App\Business\ConnectionData\ConnectionData;
use App\Business\ConnectionData\ConnectionDataFactory;
use Illuminate\Http\Request;

/**
 * Provides entries to handle the Connection of the Session.
 *
 * @package App\Business\Session
 */
class ConnectionSession
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
     * Checks the status of the Connection in the Session.
     *
     * @return boolean
     */
    public function isConnected()
    {
        $clientSession = new Session();
        $clientSession->setSession($this->session);

        return $clientSession->get(SessionConstants::CONNECTION_CONNECTED, false);
    }

    /**
     * Gets an instance of Connection from the Session.
     *
     * @return Connect
     */
    public function get()
    {
        $connectionData = ConnectionDataFactory::createFromRequestSession($this->session);

        $connect = new Connect();
        $connect->setConnectionData($connectionData);
        $connect->execute();

        return $connect->getConnection();
    }

    /**
     * Gets the information of Connection from the Session.
     *
     * @return array
     */
    public function getInfo()
    {
        $clientSession = new Session();
        $clientSession->setSession($this->session);

        // TODO: Move to a class.
        $connectionInfo = array();
        $connectionInfo[SessionConstants::CONNECTION_DRIVER] = $clientSession->get(SessionConstants::CONNECTION_DRIVER, SessionConstants::CONNECTION_DEFAULT_TEXT);
        $connectionInfo[SessionConstants::CONNECTION_HOSTNAME] = $clientSession->get(SessionConstants::CONNECTION_HOSTNAME, SessionConstants::CONNECTION_DEFAULT_TEXT);
        $connectionInfo[SessionConstants::CONNECTION_PORT] = $clientSession->get(SessionConstants::CONNECTION_PORT, SessionConstants::CONNECTION_DEFAULT_TEXT);
        $connectionInfo[SessionConstants::CONNECTION_USERNAME] = $clientSession->get(SessionConstants::CONNECTION_USERNAME, SessionConstants::CONNECTION_DEFAULT_TEXT);
        $connectionInfo[SessionConstants::CONNECTION_DATABASE] = $clientSession->get(SessionConstants::CONNECTION_DATABASE, SessionConstants::CONNECTION_DEFAULT_TEXT);

        return $connectionInfo;
    }

    /**
     * Sets the Connection of the Session from the Connection Settings.
     *
     * @param ConnectionData $connectionData
     */
    public function set(ConnectionData $connectionData)
    {
        $clientSession = new Session();
        $clientSession->setSession($this->session);

        $clientSession->set(SessionConstants::CONNECTION_DRIVER, $connectionData->driver);
        $clientSession->set(SessionConstants::CONNECTION_HOSTNAME, $connectionData->host);
        $clientSession->set(SessionConstants::CONNECTION_PORT, $connectionData->port);
        $clientSession->set(SessionConstants::CONNECTION_USERNAME, $connectionData->username);
        $clientSession->set(SessionConstants::CONNECTION_PASSWORD, $connectionData->password);
        $clientSession->set(SessionConstants::CONNECTION_DATABASE, $connectionData->database);
        $clientSession->set(SessionConstants::CONNECTION_CONNECTED, true);
    }

    /**
     * Removes the Connection and the Client Data from the Session.
     */
    public function remove()
    {
        $clientSession = new Session();
        $clientSession->setSession($this->session);

        $clientSession->remove(SessionConstants::CONNECTION_DRIVER);
        $clientSession->remove(SessionConstants::CONNECTION_HOSTNAME);
        $clientSession->remove(SessionConstants::CONNECTION_PORT);
        $clientSession->remove(SessionConstants::CONNECTION_USERNAME);
        $clientSession->remove(SessionConstants::CONNECTION_PASSWORD);
        $clientSession->remove(SessionConstants::CONNECTION_DATABASE);
        $clientSession->set(SessionConstants::CONNECTION_CONNECTED, false);

        $clientDataSession = new ClientDataSession();
        $clientDataSession->setSession($this->session);
        $clientDataSession->removeAll();
    }
}
