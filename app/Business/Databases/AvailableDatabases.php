<?php

namespace App\Business\Databases;

class AvailableDatabases
{
    public static function getAll()
    {
        return ['mysql' => 'MySQL', 'pgsql' => 'PostgreSQL'];
    }
}
