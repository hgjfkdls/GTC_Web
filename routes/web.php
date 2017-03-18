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
    return redirect()->route('correspondencia.buscar');
})->name('home');

Route::get('test', function () {
    return view('test');
})->name('test');

Route::group(['prefix' => 'correspondencia'], function () {
    Route::get('/', ['uses' => 'CorrespondenciaController@buscar', 'as' => 'correspondencia.buscar']);
    Route::get('buscar', ['uses' => 'CorrespondenciaController@buscar', 'as' => 'correspondencia.buscar']);
    Route::get('show_doc/{id}', ['uses' => 'CorrespondenciaController@show_doc', 'as' => 'correspondencia.show_doc']);
});