<?php

namespace App\Business;

use App\Business\SessionValues;
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

    public function fromRequestSession(Request $request)
    {
        $session = $request->session();
        
        $this->driver = SessionValues::get($session, 'driver');
        $this->hostname = SessionValues::get($session, 'hostname');
        $this->port = SessionValues::get($session, 'port');
        $this->username = SessionValues::get($session, 'username');
        $this->password = SessionValues::get($session, 'password');
        $this->database = SessionValues::get($session, 'database');
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