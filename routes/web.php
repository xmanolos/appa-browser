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

Route::get('/', ['as' => 'views.home', 'uses' => 'HomeController@index']);
Route::get('/menu', ['as' => 'views.menu', 'uses' => 'MenuController@index']);

Route::get('/api/test-connection', ['as' => 'connection.test', 'uses' => 'ConnectionController@testConnection']);
Route::get('/api/connect', ['as' => 'connection.connect', 'uses' => 'ConnectionController@connect']);
