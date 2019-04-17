<?php

namespace App\Business\Query\Response;

/**
 * Provides a model to query success response.
 *
 * @package App\Business\Query\Response
 */
class SuccessResponse
{
    protected $isSuccess = true;
    protected $isError = false;

    /**
     * @var string The query that was executed.
     */
    protected $query;

    /**
     * @var string The type of query that was executed.
     */
    protected $queryType;

    /**
     * @var string The result message of query that was executed.
     */
    protected $message = 'Query executed successfully!';

    /**
     * @var mixed The result data of query that was executed.
     */
    protected $data;

    /**
     * Defines the value of the query that was be executed.
     *
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * Defines the value of the type of query that was be executed.
     *
     * @param mixed $queryType
     */
    public function setQueryType($queryType)
    {
        $this->queryType = $queryType;
    }

    /**
     * Defines the value of the result message of query that was executed.
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Defines the value of the result data of query that was executed.
     *
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Gets a JSON of the response.
     *
     * @return array
     */
    public function getJson()
    {
        return get_object_vars($this);
    }
}