<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::resource('terceros', 'TercerosController');

Route::resource('propuestas', 'PropuestasController');

Route::resource('users', 'userController');

/* --- Editar watchers --- */

Route::post('editwatchers/{propuesta}', 'PropuestasController@editWatchers')->name('editwatchers');

/* --- Añadir importes --- */

Route::post('propuesta/{propuesta}/addmount', 'PropuestasController@addamount')->name('addamount');

/* --- Autocompletado de cifs --- */

Route::get('autocompletecifs', 'TercerosController@searchCifs')->name('autocifs');

/* --- Rutas especializadas para cada tipo de propuesta --- */

Route::get('/propuestas/create/obras', 'PropuestasController@createObras');

Route::get('/propuestas/create/servicios', 'PropuestasController@createServicios');

Route::get('/propuestas/create/suministros', 'PropuestasController@createSuministros');

/* --- Asignar rol a usuario --- */

Route::post('/{user}/assignrole', 'userController@assignRole');

/* --- Mostrar solo mis watchers --- */

Route::get('/propuestasasignadas', 'PropuestasController@myWatchers')->name('myWatchers');

/* --- Crear el pdf de la propuesta --- */

Route::get('/propuestas/{propuesta}/pdf', 'PropuestasController@createpdf')->name('createpdf');
