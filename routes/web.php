<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'HomeController@index')->name('home');

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

Route::get('/seccion', 'SeccionController@index')->name('seccion.index')->middleware('role:Administrador|Editor'); //para secciones y subsecciones con contenidos
Route::post('/seccion', 'SeccionController@store')->name('seccion.store')->middleware('permission:crear seccion');;
Route::post('/seccion/update', 'SeccionController@update')->name('seccion.update')->middleware('permission:editar seccion');
Route::post('/seccion/delete', 'SeccionController@destroy')->name('seccion.destroy')->middleware('permission:eliminar seccion');


/************************************ SUBSECCION *************************************************/
//para visitantes
Route::get('/subseccion/{subSeccion}', 'SubSeccionController@show')->name('subseccion.show'); //para subseccion con contenidos
//para editores
Route::post('/subseccion', 'SubSeccionController@store')->name('subseccion.store')->middleware('permission:crear subseccion');
Route::post('/subseccion/update', 'SubSeccionController@update')->name('subseccion.update')->middleware('permission:editar subseccion');
Route::post('/subseccion/delete', 'SubSeccionController@destroy')->name('subseccion.destroy')->middleware('permission:eliminar subseccion');

/************************************ CONTENIDO *************************************************/
//para editores
Route::post('/contenidos', 'ContenidoController@store')->name('contenido.store')->middleware('permission:crear contenido');
Route::post('/contenidos/update', 'ContenidoController@update')->name('contenido.update')->middleware('permission:editar contenido');
Route::post('/contenidos/delete', 'ContenidoController@destroy')->name('contenido.destroy')->middleware('permission:eliminar contenido');

/************************************ AVISO *************************************************/
//para editores
Route::post('/aviso', 'AvisoController@store')->name('aviso.store')->middleware('permission:crear aviso');
Route::post('/aviso/update', 'AvisoController@update')->name('aviso.update')->middleware('permission:editar aviso');
Route::post('/aviso/delete', 'AvisoController@destroy')->name('aviso.destroy')->middleware('permission:eliminar aviso');

/************************************ USER *************************************************/
//para admin
Route::get('/users', 'UsersController@index')->name('users.index')->middleware('permission:leer usuario');
Route::get('users/create', 'UserController@create')->name('users.create')->middleware('permission:crear usuario');
Route::post('/users', 'UsersController@store')->name('users.store')->middleware('permission:crear usuario');
Route::post('/users/update', 'UsersController@update')->name('users.update')->middleware('permission:editar usuario');
Route::post('/users/delete', 'UsersController@destroy')->name('users.destroy')->middleware('permission:eliminar usuario');

/*********************************** BITACORA *************************************************/
//para admin
Route::get('/bitacora', 'BitacoraController@index')->name('bitacora.index')->middleware('role:Administrador');
