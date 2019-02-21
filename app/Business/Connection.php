<?php

namespace App\Business;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Connection
{
    public static function isConnected(Request $request)
    {
        if ($request->session()->has('connected'))
            return $request->session()->get('connected');

        return false;
    }

    public static function getInstance(Request $request)
    {
        // TODO: Already exists?
        $connection = Connection::getConnection($request);
        Config::set('database.connections.' . 'custom-connection', $connection);

        return DB::connection('custom-connection'); // TODO: Rename to ClientConnection.
    }

    public static function dropInstance()
    {
        DB::purge('custom-connection');
    }

    private static function getConnection(Request $request)
    {
        $connection = array();
        $connection['driver'] = $request->session()->get('driver');
        $connection['host'] = $request->session()->get('hostname');
        $connection['port'] = $request->session()->get('port');
        $connection['username'] = $request->session()->get('username');
        $connection['password'] = $request->session()->get('password');
        $connection['database'] = $request->session()->get('database');

        return $connection;
    }
}
