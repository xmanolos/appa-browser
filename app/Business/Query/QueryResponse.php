<?php

namespace App\Business\Query;

class QueryResponse
{
    public static function getSuccess($queryType, $message = 'Query executed successfully!', $data = null)
    {
    	$responseArray = ['type' => $queryType, 'state' => 'success', 'message' => $message, 'data' => $data];
        QueryResponse::utf8_encode_deep($responseArray);
    	return \json_encode($responseArray);
    }

    public static function utf8_encode_deep(&$input) {
        if (is_string($input)) {
            $input = utf8_encode($input);
        } else if (is_array($input)) {
            foreach ($input as &$value) {
                QueryResponse::utf8_encode_deep($value);
            }

            unset($value);
        } else if (is_object($input)) {
            $vars = array_keys(get_object_vars($input));

            foreach ($vars as $var) {
                QueryResponse::utf8_encode_deep($input->$var);
            }
        }
    }

    public static function getError(\Exception $exception, $message = 'Failed to execute query!')
    {
    	$exceptionMessage = $exception->getMessage();
    	$responseArray = ['state' => 'error', 'message' => $message, 'exception' => $exceptionMessage];

    	return \json_encode($responseArray);
    }
}
