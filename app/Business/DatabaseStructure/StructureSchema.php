<?php

namespace App\Business\DatabaseStructure;

/**
 * A schema of the database.
 *
 * @package App\Business\DatabaseStructure
 */
class StructureSchema
{
    /**
     * The schema name.
     */
    public $name;

    /**
     * The schema charset.
     */
    public $charset;

    /**
     * Gets the schema name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the column tables.
     *
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * Defines the value of the schema name.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Defines the value of the schema charset.
     *
     * @param string $charset
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
    }
}