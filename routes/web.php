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
/*************************************** HOME ****************************************************/
//para visitantes
Route::get('/home', 'HomeController@index')->name('home');
//para editores
Route::get('/home2', 'HomeController@index2')->name('home2');

/*************************************** SECCION **************************************************/
//para visitantes
Route::get('/seccion/{seccion}', 'SeccionController@show')->name('seccion.show'); //para seccion con contenidos
//para editores
Route::get('/seccion', 'SeccionController@index')->name('seccion.index'); //para secciones y subsecciones con contenidos
Route::post('/seccion', 'SeccionController@store')->name('seccion.store');
Route::put('/seccion', 'SeccionController@update')->name('seccion.update');
Route::delete('/seccion', 'SeccionController@destroy')->name('seccion.destroy');

/************************************ SUBSECCION *************************************************/
//para visitantes
Route::get('/subseccion/{subseccion}', 'SubSeccionController@show')->name('subseccion.show'); //para subseccion con contenidos
//para editores
Route::post('/subseccion', 'SubSeccionController@store')->name('subseccion.store');
Route::put('/subseccion', 'SubSeccionController@update')->name('subseccion.update');
Route::delete('/subseccion', 'SubSeccionController@destroy')->name('subseccion.destroy');

/************************************ CONTENIDO *************************************************/
//para editores
Route::post('/contenidos', 'ContenidoController@store')->name('contenido.store');
Route::put('/contenidos', 'ContenidoController@update')->name('contenido.update');
Route::delete('/contenidos', 'ContenidoController@destroy')->name('contenido.destroy');

/************************************ AVISO *************************************************/
//para editores
Route::post('/home2', 'AvisoController@store')->name('aviso.store');
Route::put('/home2', 'AvisoController@update')->name('aviso.update');
Route::delete('/home2', 'AvisoController@destroy')->name('aviso.destroy');

/************************************ USER *************************************************/
//para admin
Route::get('/users', 'UsersController@index')->name('users.index');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::put('/users', 'UsersController@update')->name('users.update');
Route::delete('/users', 'UsersController@destroy')->name('users.destroy');

/*********************************** BITACORA *************************************************/
//para admin
Route::get('/bitacora', 'BitacoraController@index')->name('bitacora.index');
