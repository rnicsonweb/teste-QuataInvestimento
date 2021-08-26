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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/cadastrar', 'HomeController@cadastrar');
Route::get('/remover/{id}', 'HomeController@remover');
Route::post('/cadastrando', 'HomeController@cadastrando');
Route::post('/editando/{id}', 'HomeController@editando');
Route::get('/editar/{id}', 'HomeController@editar');