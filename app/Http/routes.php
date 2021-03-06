<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Main@index');
Route::get('login', 'Auth\AuthController@getLogin'); //Alias
Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('login', 'Auth\AuthController@postLogin'); //Alias
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout'); //Alias
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::controller('dashboard', 'Dashboard\Dashboard');
Route::controller('mailings', 'Mailings\Mailings');
Route::controller('senders', 'Senders\Senders');
Route::controller('subscribers', 'Subscribers\Subscribers');
Route::controller('subscribers-lists', 'Subscribers\Lists');
Route::controller('tasks', 'Tasks\Tasks');
Route::controller('test', 'Senders\Tests');