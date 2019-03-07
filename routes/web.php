<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/connect', ['as' => 'connect', 'uses' => 'ConnectController@index']);

Route::prefix('api')->group(function () 
{
    // Connection Routes.
	Route::get('connect', ['as' => 'api.connection.connect', 'uses' => 'ConnectionController@connect']);
	Route::get('disconnect', ['as' => 'api.connection.disconnect', 'uses' => 'ConnectionController@disconnect']);
	Route::get('test-connection', ['as' => 'api.connection.test', 'uses' => 'ConnectionController@testConnection']);
	Route::get('info-connection', ['as' => 'api.connection.info', 'uses' => 'ConnectionController@getInfo']);

	// Database Data Management Routes.
	Route::get('database-data/get', ['as' => 'api.database-data.get', 'uses' => 'DatabaseDataController@get']);

	// Query Execution.
	Route::post('query/run', ['as' => 'api.query.run', 'uses' => 'QueryController@run']);
});