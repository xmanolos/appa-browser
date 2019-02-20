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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test-connection', ['as' => 'api.connection.test', 'uses' => 'ConnectionController@testConnection']);
Route::get('connect', ['as' => 'api.connection.connect', 'uses' => 'ConnectionController@connect']);

Route::get('database-data/get', ['as' => 'api.database-data.get', 'uses' => 'DatabaseDataController@get']);