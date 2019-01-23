<?php

namespace App\Business;

class ConnectionData
{
    protected $driver;
    protected $host;
    protected $port;
    protected $username;
    protected $password;
    protected $database;

    function __construct($driver, $host, $port, $username, $password, $database) {
        $this->driver = $driver;
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        return $this;
    }

    public function getDriver() { return $this->driver; }
    public function getHost() { return $this->host; }
    public function getPort() { return $this->port; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getDatabase() { return $this->database; }

    public function setDriver($driver) { $this->driver = $driver; return $this;  }
    public function setHost($host) { $this->host = $host; return $this; }
    public function setPort($port) { $this->port = $port; return $this; }
    public function setUsername($username) { $this->username = $username; return $this; }
    public function setPassword($password) { $this->password = $password; return $this; }
    public function setDatabase($database) { $this->database = $database; return $this; }
}
