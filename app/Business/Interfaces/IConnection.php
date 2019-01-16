<?php

namespace App\Business\Interfaces;

interface IConnection 
{
    public function getConnectionIdentifier();
    public function getConnectionDrive();
    public function getConnectionInstance($connectionData);
}