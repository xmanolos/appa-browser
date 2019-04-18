<?php

namespace App\Business\DatabaseData;

use App\Business\DatabaseData\DataStructures\StructureRoutine;

class DatabaseRoutines extends DatabaseData
{
    public function get($schema)
    {
        $routines = array();

        $query = "SELECT ROUTINE_NAME AS name FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = '$schema';";
        $routinesResults = $this->connection->select($query);

        sort($routinesResults);

        foreach($routinesResults as $routineResult)
        {
            $routine = new StructureRoutine();
            $routine->setName($routineResult->name);

            array_push($routines, $routine);
        }

        return $routines;
    }
}