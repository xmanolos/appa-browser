<?php

namespace App\Business;

class AvailableDatabases
{
    public static function getAll()
    {
        return ['mysql' => 'MySQL', 'pgsql' => 'PostgreSQL'];
    }
}
