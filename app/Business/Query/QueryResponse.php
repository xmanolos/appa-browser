<?php

namespace App\Business\Query;

class QueryResponse
{
    public static function getSuccess($message = 'Query executed successfully!')
    {
    	$responseArray = ['state' => 'success', 'message' => $message];

    	return \json_encode($responseArray);
    }

    public static function getError(\Exception $exception, $message = 'Failed to execute query!')
    {
    	$exceptionMessage = $exception->getMessage();
    	$responseArray = ['state' => 'error', 'message' => $message, 'exception' => $exceptionMessage];

    	return \json_encode($responseArray);
    }
}