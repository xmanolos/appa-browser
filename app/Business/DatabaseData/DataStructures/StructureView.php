<?php

namespace App\Business\DatabaseData\DataStructures;

/**
 * A view of the database.
 *
 * @package App\Business\DatabaseData\DataStructures
 */
class StructureView
{
	/**
	 * The view name.
	 */
    public $name;

    /**
     * Gets the view name.
     *
     * @return string
     */
    public function getName()
    {
    	return $this->name;
    }

    /**
     * Defines the value of the view name.
     *
     * @param string $name
     */
    public function setName($name)
    {
    	$this->name = $name;
    }
}