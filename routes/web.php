<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/seccion', 'SeccionController@index')->name('seccion');

Route::get('/seccion/{seccion}', 'SeccionController@show')->name('seccion.show');

Route::get('/subseccion', 'SubSeccionController@index')->name('subseccion');

Route::get('/subseccion/{subSeccion}', 'SubSeccionController@show')->name('subseccion.show');

Route::get('/subseccion/create', 'SubSeccionController@create')->name('subseccion.create');
