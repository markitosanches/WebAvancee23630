<?php
use App\Routes\Route;

use App\Controllers\HomeController;

Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');

Route::dispatch();

?>