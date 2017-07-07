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


Route::group(['prefix' => '/'], function (){
    Route::resource('/','HomeController');
});

Route::group(['prefix' => '/practica'], function (){
    Route::resource('/practica','PracticaController');
});

Route::get('/index','HomeController@index');

Route::get('info/{id}',[
    'uses' => 'HomeController@info',
    'as'   => 'info'
]);

Route::get('ver/{id}',[
    'uses' => 'HomeController@ver',
    'as'   => 'ver'
]);

Route::get('practica',[
    'uses' => 'PracticaController@practicando',
    'as'   => 'practica'
]);

//cerrar sesion de practica
Route::get('practica/index','PracticaController@index');

Route::get('consulta/{id}',[
    'uses' => 'HomeController@practicar',
    'as'   => 'practicar'
]);





