<?php

namespace App\Business;

use App\Business\Session\Session;
use Illuminate\Http\Request;

class ConnectionConfig
{
    protected $driver;
    protected $hostname;
    protected $port;
    protected $username;
    protected $password;
    protected $database;

    public function getDriver() { return $this->driver; }
    public function getHostname() { return $this->hostname; }
    public function getPort() { return $this->port; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getDatabase() { return $this->database; }

    public function fromRequestInput(Request $request)
    {
        $this->driver = $request->input('driver');
        $this->hostname = $request->input('hostname');
        $this->port = $request->input('port');
        $this->username = $request->input('username');
        $this->password = $request->input('password');
        $this->database = $request->input('database');
    }

    public function fromRequestSession($requestSession)
    {
        $session = new Session();
        $session->setSession($requestSession);

        $this->driver = $session->get('driver');
        $this->hostname = $session->get('hostname');
        $this->port = $session->get('port');
        $this->username = $session->get('username');
        $this->password = $session->get('password');
        $this->database = $session->get('database');
    }

    public function get()
    {
    	return [
            'driver'    => $this->driver,
            'host'      => $this->hostname,
            'port'      => $this->port,
            'username'  => $this->username,
            'password'  => $this->password,
            'database'  => $this->database
        ];
    }
}