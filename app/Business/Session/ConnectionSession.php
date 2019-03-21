<?php

namespace App\Business\Session;

use App\Business\Connection\Connect;
use App\Business\ConnectionConfig;
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

        return $clientSession->get('connected', false); // TODO: Move to constants.
    }

    /**
     * Gets an instance of Connection from the Session.
     *
     * @return Connect
     */
    public function get()
    {
        $connectionConfig = new ConnectionConfig();
        $connectionConfig->fromRequestSession($this->session);

        $connect = new Connect();
        $connect->setConnectionConfig($connectionConfig);
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

        $connectionInfo = array();
        $connectionInfo['driver'] = $clientSession->get('driver', 'Unknown'); // TODO: Move to constants.
        $connectionInfo['hostname'] = $clientSession->get('hostname', 'Unknown'); // TODO: Move to constants.
        $connectionInfo['port'] = $clientSession->get('port', 'Unknown'); // TODO: Move to constants.
        $connectionInfo['username'] = $clientSession->get('username', 'Unknown'); // TODO: Move to constants.
        $connectionInfo['database'] = $clientSession->get('database', 'Unknown'); // TODO: Move to constants.

        return $connectionInfo;
    }

    /**
     * Sets the Connection of the Session from the Connection Settings.
     *
     * @param ConnectionConfig $connectionConfig
     */
    public function set(ConnectionConfig $connectionConfig) // TODO: Rename "ConnectionConfig" to "ConnectionSettings".
    {
        $clientSession = new Session();
        $clientSession->setSession($this->session);

        $clientSession->set('driver', $connectionConfig->getDriver()); // TODO: Move to constants.
        $clientSession->set('hostname', $connectionConfig->getHostname()); // TODO: Move to constants.
        $clientSession->set('port', $connectionConfig->getPort()); // TODO: Move to constants.
        $clientSession->set('username', $connectionConfig->getUsername()); // TODO: Move to constants.
        $clientSession->set('password', $connectionConfig->getPassword()); // TODO: Move to constants.
        $clientSession->set('database', $connectionConfig->getDatabase()); // TODO: Move to constants.
        $clientSession->set('connected', true); // TODO: Move to constants.
    }

    /**
     * Removes the Connection and the Client Data from the Session.
     */
    public function remove()
    {
        $clientSession = new Session();
        $clientSession->setSession($this->session);

        $clientSession->remove('driver'); // TODO: Move to constants.
        $clientSession->remove('hostname'); // TODO: Move to constants.
        $clientSession->remove('port'); // TODO: Move to constants.
        $clientSession->remove('username'); // TODO: Move to constants.
        $clientSession->remove('password'); // TODO: Move to constants.
        $clientSession->remove('database'); // TODO: Move to constants.
        $clientSession->set('connected', false); // TODO: Move to constants.

        $clientDataSession = new ClientDataSession();
        $clientDataSession->setSession($this->session);
        $clientDataSession->removeAll();
    }
}
