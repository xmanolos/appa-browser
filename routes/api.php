<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Connection Routes.
Route::get('connect', ['as' => 'api.connection.connect', 'uses' => 'ConnectionController@connect']);
Route::get('test-connection', ['as' => 'api.connection.test', 'uses' => 'ConnectionController@testConnection']);

// Database Data Management Routes.
Route::get('database-data/get', ['as' => 'api.database-data.get', 'uses' => 'DatabaseDataController@get']);