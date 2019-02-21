<?php

use App\Http\Controllers\TestConnectionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// TODO: Fix not connection to use.
// TODO: Fix routes aliases.
Route::get('/', ['as' => 'views.home', 'uses' => 'HomeController@index']);
Route::get('/connect', ['as' => 'views.connect', 'uses' => 'ConnectController@index']);

Route::prefix('api')->group(function () 
{
    // Connection Routes.
	Route::get('connect', ['as' => 'api.connection.connect', 'uses' => 'ConnectionController@connect']);
	Route::get('disconnect', ['as' => 'api.connection.disconnect', 'uses' => 'ConnectionController@disconnect']);
	Route::get('test-connection', ['as' => 'api.connection.test', 'uses' => 'ConnectionController@testConnection']);

	// Database Data Management Routes.
	Route::get('database-data/get', ['as' => 'api.database-data.get', 'uses' => 'DatabaseDataController@get']);
});