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

    public function getDriver() { return $this->driver; }
    public function getHost() { return $this->host; }
    public function getPort() { return $this->port; }
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getDatabase() { return $this->database; }

    public function setDriver($driver) { $this->driver = $driver; }
    public function setHost($host) { $this->host = $host; }
    public function setPort($port) { $this->port = $port; }
    public function setUsername($username) { $this->username = $username; }
    public function setPassword($password) { $this->password = $password; }
    public function setDatabase($database) { $this->database = $database; }
}
