<?php

namespace App\Business\Query\Response;

/**
 * Provides a model to query error response.
 *
 * @package App\Business\Query\Response
 */
class ErrorResponse
{
    protected $isSuccess = false;
    protected $isError = true;

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
    protected $responseMessage = 'Failed to execute query!';

    /**
     * @var string The result exception of query that was executed.
     */
    protected $responseException;

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
     * @param string $responseMessage
     */
    public function setResponseMessage($responseMessage)
    {
        $this->responseMessage = $responseMessage;
    }

    /**
     * Defines the value of the result exception of query that was executed.
     *
     * @param \Exception $responseException
     */

    public function setResponseException(\Exception $responseException)
    {
        $this->responseException = $responseException->getMessage(); // TODO: Fix.
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