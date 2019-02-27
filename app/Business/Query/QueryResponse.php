<?php

namespace App\Business\Query;

class QueryResponse
{
    public static function getSuccess($queryType, $message = 'Query executed successfully!', $data = null)
    {
    	$responseArray = ['type' => $queryType, 'state' => 'success', 'message' => $message, 'data' => $data];

    	return \json_encode($responseArray);
    }

    public static function getError(\Exception $exception, $message = 'Failed to execute query!')
    {
    	$exceptionMessage = $exception->getMessage();
    	$responseArray = ['state' => 'error', 'message' => $message, 'exception' => $exceptionMessage];

    	return \json_encode($responseArray);
    }
}