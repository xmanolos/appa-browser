<?php

namespace App\Business\Query\Executor;

use App\Business\Connection;
use App\Business\Interfaces\IQueryExecutor;
use App\Business\Query\QueryResponse;

class DeleteExecutor implements IQueryExecutor
{
    protected $response;

    public static function queryMatch($query)
    {
        $query = trim($query);
        $queryUpperCase = strtoupper($query);

        return strpos($queryUpperCase, 'DELETE') === 0;
    }
    
    public function execute($request, $query)
    {
        try 
        {
            $connection = Connection::getInstance($request);
            
            $result = $connection->delete($query);
            $resultMessage = $message = 'Query executed successfully! ' . $result . ' affected rows.'; // TODO: Use mix.

            $this->response = QueryResponse::getSuccess($resultMessage);
        }
        catch (\Exception $exception)
        {
            $this->response = QueryResponse::getError($exception);
        }
    }

    public function getResponse()
    {
        return $this->response;
    }
}