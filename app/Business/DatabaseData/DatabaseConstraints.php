<?php

namespace App\Business\DatabaseData;

use App\Business\DatabaseData\DataStructures\StructureConstraint;

class DatabaseConstraints extends DatabaseData
{
    public function get($schema, $table)
    {
        $constraints = array();

        $query = "SELECT CONSTRAINT_NAME AS name, CONSTRAINT_TYPE AS type FROM information_schema.TABLE_CONSTRAINTS WHERE CONSTRAINT_SCHEMA = '$schema' AND TABLE_NAME = '$table' AND CONSTRAINT_TYPE IN ('PRIMARY KEY', 'FOREIGN KEY');";
        $constraintsResults = $this->connection->select($query);

        sort($constraintsResults);

        foreach($constraintsResults as $constraintResult)
        {
            $constraint = new StructureConstraint();
            $constraint->setName($constraintResult->name);
            $constraint->setType($constraintResult->type);

            array_push($constraints, $constraint);
        }

        return $constraints;
    }
}