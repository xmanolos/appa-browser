<?php
use Illuminate\Http\Request;

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
Route::get('/', ['as' => 'views.home', 'uses' => 'HomeController@index']);
Route::get('/connect', ['as' => 'views.connect', 'uses' => 'ConnectController@index']);

Route::get('/api/test-connection', ['as' => 'api.connection.test', 'uses' => 'ConnectionController@testConnection']);
Route::get('/api/connect', ['as' => 'api.connection.connect', 'uses' => 'ConnectionController@connect']);

Route::get('/api/database-data/get', ['as' => 'api.database-data.get', 'uses' => 'DatabaseDataController@get']);
