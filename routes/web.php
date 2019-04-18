<?php

use \Illuminate\Support\Facades\Route;

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
	Route::get('database-data/schemas/get', ['as' => 'api.database-data.schemas.get', 'uses' => 'DatabaseDataController@getSchemas']);
	Route::get('database-data/tables/get', ['as' => 'api.database-data.tables.get', 'uses' => 'DatabaseDataController@getTables']);
	Route::get('database-data/views/get', ['as' => 'api.database-data.views.get', 'uses' => 'DatabaseDataController@getViews']);
    Route::get('database-data/routines/get', ['as' => 'api.database-data.routines.get', 'uses' => 'DatabaseDataController@getRoutines']);
	Route::get('database-data/table/columns/get', ['as' => 'api.database-data.table.columns.get', 'uses' => 'DatabaseDataController@getTableColumns']);
	Route::get('database-data/table/constraints/get', ['as' => 'api.database-data.table.constraints.get', 'uses' => 'DatabaseDataController@getTableConstraints']);
    Route::get('database-data/table/triggers/get', ['as' => 'api.database-data.table.triggers.get', 'uses' => 'DatabaseDataController@getTableTriggers']);
	Route::get('database-data/view/columns/get', ['as' => 'api.database-data.view.columns.get', 'uses' => 'DatabaseDataController@getViewColumns']);

	// Query Execution.
	Route::post('query/run', ['as' => 'api.query.run', 'uses' => 'QueryController@run']);

	// SessionProcessor.
    Route::post('session/selected-schema/store', ['as' => 'api.session.selected-schema.store', 'uses' => 'SessionController@storeSelectedSchema']);
    Route::get('session/selected-schema/load', ['as' => 'api.session.selected-schema.load', 'uses' => 'SessionController@loadSelectedSchema']);
});