<?php

namespace App\Business\Query;

class QueryResponseEncode
{
    public static function set(&$queryResponse) 
    {
        if (is_string($queryResponse)) 
            QueryResponseEncode::setOnString($queryResponse);
        else if (is_array($queryResponse)) 
            QueryResponseEncode::setOnArray($queryResponse);
        else if (is_object($queryResponse)) 
            QueryResponseEncode::setOnObject($queryResponse);
    }

    public static function setOnString(&$responseString) 
    {
        $responseString = utf8_encode($responseString);
    }

    public static function setOnArray(&$responseArray)
    {
        foreach ($responseArray as &$responseArrayItem) 
        {
            QueryResponseEncode::set($responseArrayItem);
        }

        unset($responseArrayItem);
    }

    public static function setOnObject(&$responseObject)
    {
        $responseObjectVars = array_keys(get_object_vars($responseObject));

        foreach ($responseObjectVars as $responseObjectVar) 
        {
            QueryResponseEncode::set($responseObject->$responseObjectVar);
        }
    }
}