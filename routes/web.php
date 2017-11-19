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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['admin'])->group(function () {
  Route::resource('/Usuario','UsuarioController');
  Route::resource('/Cuarto','CuartoController');
  Route::resource('/Doctor','DoctorController');
  Route::resource('/Paciente','PacienteController');
  Route::resource('/Analisis','AnalisiController');

});

Route::middleware(['doc'])->group(function () {
  Route::resource('/Cuarto','CuartoController');
  Route::resource('/Doctor','DoctorController');
  Route::resource('/Paciente','PacienteController');
  Route::resource('/Analisis','AnalisiController');
});

Route::middleware(['secre'])->group(function () {
  Route::resource('/Cuarto','CuartoController');
  Route::resource('/Doctor','DoctorController');
  Route::resource('/Paciente','PacienteController');
});
