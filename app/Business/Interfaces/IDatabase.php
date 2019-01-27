<?php

namespace App\Business\Interfaces;

interface IDatabase 
{
    public function getDatabaseIdentifier();
    public function getDatabaseDrive();
}