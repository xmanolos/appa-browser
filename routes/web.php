<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/connect', ['as' => 'connect', 'uses' => 'ConnectController@index']);

Route::prefix('api')->group(function ()
{
    // Connection Routes.
	Route::get('connect', ['as' => 'api.connection.connect', 'uses' => 'ConnectionController@connect']);
	Route::get('disconnect', ['as' => 'api.connection.disconnect', 'uses' => 'ConnectionController@disconnect']);
	Route::get('test-connection', ['as' => 'api.connection.test', 'uses' => 'ConnectionController@testConnection']);

	// Database Data Management Routes.
	Route::get('database-data/schemas/get', ['as' => 'api.database-data.schemas.get', 'uses' => 'DatabaseDataController@getSchemas']);
	Route::get('database-data/tables/get', ['as' => 'api.database-data.tables.get', 'uses' => 'DatabaseDataController@getTables']);
	Route::get('database-data/views/get', ['as' => 'api.database-data.views.get', 'uses' => 'DatabaseDataController@getViews']);
	Route::get('database-data/columns/get', ['as' => 'api.database-data.columns.get', 'uses' => 'DatabaseDataController@getColumns']);

	// Query Execution.
	Route::post('query/run', ['as' => 'api.query.run', 'uses' => 'QueryController@run']);

	// Session.
    Route::post('session/schema/store', ['as' => 'api.session.schema.store', 'uses' => 'SessionController@storeSchema']);
    Route::get('session/schema/load', ['as' => 'api.session.schema.load', 'uses' => 'SessionController@loadSchema']);
});