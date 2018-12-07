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

//Funcionarios
Route::group(['prefix' => '/funcionarios', 'as' => 'funcionarios.'], function () {
	Route::match( array( 'GET' ), '', array('as' => 'list', 'uses' => 'FuncionariosController@index'))->middleware('auth');
	Route::match( array( 'GET', 'POST' ), '/create', array('as' => 'create', 'uses' => 'FuncionariosController@create'));
	Route::match( array( 'GET', 'PATCH' ), '/{ID}/edit', array('as' => 'edit', 'uses' => 'FuncionariosController@edit'));
	Route::match( array( 'DELETE' ), '/{ID}/delete', array('as' => 'destroy', 'uses' => 'FuncionariosController@destroy'));
});

Route::get('/home', 'HomeController@index')->name('home');
