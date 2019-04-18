<?php

namespace App\Business\DatabaseData;

use App\Business\DatabaseData\DataStructures\StructureSchema;

class DatabaseSchemas extends DatabaseData
{
    public function get()
    {
        $schemas = array();

        $query = 'SELECT SCHEMA_NAME AS name, default_character_set_name AS charset FROM information_schema.SCHEMATA;';
        $schemasResults = $this->connection->select($query);

        sort($schemasResults);

        foreach($schemasResults as $schemaResult)
        {
            $schema = new StructureSchema();
            $schema->setName($schemaResult->name);
            $schema->setCharset($schemaResult->charset);

            array_push($schemas, $schema);
        }

        return $schemas;
    }
}