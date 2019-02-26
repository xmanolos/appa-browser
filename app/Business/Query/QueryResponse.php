<?php

namespace App\Business\Query;

class QueryResponse
{
    public static function success()
    {
    	$responseArray = ['state' => 'success'];

    	return \json_encode($responseArray);
    }

    public static function error(\Exception $exception)
    {
    	$exceptionMessage = $exception->getMessage();
    	$responseArray = ['state' => 'error', 'exception' => $exceptionMessage];

    	return \json_encode($responseArray);
    }
}