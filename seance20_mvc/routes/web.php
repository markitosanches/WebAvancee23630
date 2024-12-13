<?php
use App\Routes\Route;

use App\Controllers\HomeController;
use App\Controllers\ClientController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');

Route::get('/clients', 'ClientController@index');
Route::get('/client/show', 'ClientController@show');
Route::get('/client/create', 'ClientController@create');
Route::post('/client/create', 'ClientController@store');
Route::get('/client/edit', 'ClientController@edit');
Route::post('/client/edit', 'ClientController@update');
Route::post('/client/delete', 'ClientController@delete');


Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::dispatch();

?>