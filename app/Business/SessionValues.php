<?php

namespace App\Business;

class SessionValues
{
    public static function add($session, $key, $value)
    {
        $session->put($key, $value);
    }

    public static function get($session, $key, $default = null)
    {
        if ($session->has($key))
            return $session->get($key);
                
        return $default;
    }

    public static function set($session, $key, $value)
    {
        if ($session->has($key))
            $session->remove($key);
                
        $session->put($key, $value);
    }

    public static function forgetByKey($session, $key)
    {
        if ($session->has($key))
            $session->forget($key);
    }

    public static function forgetByKeys($session, $keys)
    {
        foreach ($keys as $key)
            $session->forget($key);
    }

    public static function removeByKey($session, $key)
    {
        if ($session->has($key))
            $session->remove($key);
    }

    public static function removeByKeys($session, $keys)
    {
        foreach ($keys as $key)
            $session->remove($key);
    }
}
