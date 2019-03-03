<?php

namespace App\Business;

use App\Business\ConnectionData;
use App\Business\Connection\Connect;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Http\Request;

class ClientSession
{
    protected $request;

    public function setRequest(Request $request)  { $this->request = $request; }

    public function isConnected()
    {
        $session = $this->request->session();

        return SessionValues::get($session, 'connected', false);        
    }

    public function getConnection()
    {
        $connectionConfig = new ConnectionConfig();
        $connectionConfig->fromRequestSession($this->request);

        $connect = new Connect();
        $connect->setConnectionConfig($connectionConfig);
        $connect->execute();

        return $connect->getConnection();
    }

    public function storeConnection(ConnectionConfig $connectionConfig)
    {
        $session = $this->request->session();
     
        SessionValues::set($session, 'driver', $connectionConfig->getDriver());
        SessionValues::set($session, 'hostname', $connectionConfig->getHostname());
        SessionValues::set($session, 'port', $connectionConfig->getPort());
        SessionValues::set($session, 'username', $connectionConfig->getUsername());
        SessionValues::set($session, 'password', $connectionConfig->getPassword());
        SessionValues::set($session, 'database', $connectionConfig->getDatabase());
        SessionValues::set($session, 'connected', true);
    }

    public function forgetConnection()
    {
        $session = $this->request->session();

        SessionValues::forgetByKeys($session, ['driver', 'hostname', 'port', 'username', 'password', 'database']);
        SessionValues::set($session, 'connected', false);
    } 
}
