<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PlanetController@index');

Route::resource('planets', 'App\Http\Controllers\PlanetController');
