<?php

namespace App\Business\DatabaseData;

use App\Business\DatabaseData\DataStructures\StructureTrigger;

class DatabaseTriggers extends DatabaseData
{
    public function get($schema, $table)
    {
        $triggers = array();

        $query = "SELECT TRIGGER_NAME AS name FROM information_schema.TRIGGERS WHERE TRIGGER_SCHEMA = '$schema' AND EVENT_OBJECT_TABLE = '$table';";
        $constraintsResults = $this->connection->select($query);

        sort($constraintsResults);

        foreach($constraintsResults as $constraintResult)
        {
            $constraint = new StructureTrigger();
            $constraint->setName($constraintResult->name);

            array_push($triggers, $constraint);
        }

        return $triggers;
    }
}