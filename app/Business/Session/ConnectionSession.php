<?php

namespace App\Business\Session;

use App\Business\Connection\Connect;
use App\Business\ConnectionData\ConnectionData;
use App\Business\ConnectionData\ConnectionDataFactory;
use App\Business\Session\SessionConstants;
use App\Business\Session\SessionProcessor;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

/**
 * Manages the connection in the session.
 *
 * @package App\Business\Session
 */
class ConnectionSession
{
    /**
     * @var Session The session that will be managed.
     */
    protected $session;

    /**
     * Defines the value of the session that will be managed.
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
     * Checks the status of the connection in the session.
     *
     * @return boolean
     */
    public function isConnected()
    {
        $sessionProcessor = new SessionProcessor();
        $sessionProcessor->setSession($this->session);

        return $sessionProcessor->get(SessionConstants::CONNECTION_CONNECTED, false);
    }

    /**
     * Gets an instance of connection from the session.
     *
     * @return Connect
     */
    public function get()
    {
        $connectionData = ConnectionDataFactory::createFromSession($this->session);

        $connect = new Connect();
        $connect->setConnectionData($connectionData);
        $connect->execute();

        return $connect->getConnection();
    }

    /**
     * Gets the information of connection from the session.
     *
     * @return array
     */
    public function getInfo()
    {
        $sessionProcessor = new SessionProcessor();
        $sessionProcessor->setSession($this->session);

        // TODO: Move to a class.
        $connectionInfo = array();
        $connectionInfo[SessionConstants::CONNECTION_DRIVER] = $sessionProcessor->get(SessionConstants::CONNECTION_DRIVER, SessionConstants::CONNECTION_DEFAULT_TEXT);
        $connectionInfo[SessionConstants::CONNECTION_HOSTNAME] = $sessionProcessor->get(SessionConstants::CONNECTION_HOSTNAME, SessionConstants::CONNECTION_DEFAULT_TEXT);
        $connectionInfo[SessionConstants::CONNECTION_PORT] = $sessionProcessor->get(SessionConstants::CONNECTION_PORT, SessionConstants::CONNECTION_DEFAULT_TEXT);
        $connectionInfo[SessionConstants::CONNECTION_USERNAME] = $sessionProcessor->get(SessionConstants::CONNECTION_USERNAME, SessionConstants::CONNECTION_DEFAULT_TEXT);
        $connectionInfo[SessionConstants::CONNECTION_DATABASE] = $sessionProcessor->get(SessionConstants::CONNECTION_DATABASE, SessionConstants::CONNECTION_DEFAULT_TEXT);

        return $connectionInfo;
    }

    /**
     * Sets the connection of the session from the connection data.
     *
     * @param ConnectionData $connectionData
     */
    public function set(ConnectionData $connectionData)
    {
        $sessionProcessor = new SessionProcessor();
        $sessionProcessor->setSession($this->session);

        $sessionProcessor->set(SessionConstants::CONNECTION_DRIVER, $connectionData->driver);
        $sessionProcessor->set(SessionConstants::CONNECTION_HOSTNAME, $connectionData->host);
        $sessionProcessor->set(SessionConstants::CONNECTION_PORT, $connectionData->port);
        $sessionProcessor->set(SessionConstants::CONNECTION_USERNAME, $connectionData->username);
        $sessionProcessor->set(SessionConstants::CONNECTION_PASSWORD, $connectionData->password);
        $sessionProcessor->set(SessionConstants::CONNECTION_DATABASE, $connectionData->database);
        $sessionProcessor->set(SessionConstants::CONNECTION_CONNECTED, true);
    }

    /**
     * Removes the connection and the client data from the session.
     */
    public function remove()
    {
        $sessionProcessor = new SessionProcessor();
        $sessionProcessor->setSession($this->session);

        $sessionProcessor->remove(SessionConstants::CONNECTION_DRIVER);
        $sessionProcessor->remove(SessionConstants::CONNECTION_HOSTNAME);
        $sessionProcessor->remove(SessionConstants::CONNECTION_PORT);
        $sessionProcessor->remove(SessionConstants::CONNECTION_USERNAME);
        $sessionProcessor->remove(SessionConstants::CONNECTION_PASSWORD);
        $sessionProcessor->remove(SessionConstants::CONNECTION_DATABASE);
        $sessionProcessor->set(SessionConstants::CONNECTION_CONNECTED, false);

        $clientDataSession = new ClientDataSession();
        $clientDataSession->setSession($this->session);
        $clientDataSession->removeAll();
    }
}
