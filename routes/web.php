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
    return redirect()->route('correspondencia.simple_search');
})->name('home');

Route::get('test', function () {
    return view('test');
})->name('test');

Route::resource('login', 'LoginController', [
    'names' => [
        'index' => 'login',
        'create' => 'login.create',
        'store' => 'login.store',
    ]
]);

Route::group(['prefix' => 'correspondencia'], function () {
    Route::get('/', 'CorrespondenciaController@simple_search')->name('correspondencia.simple_search');
    Route::get('simple_search', 'CorrespondenciaController@simple_search')->name('correspondencia.simple_search');
    Route::get('advanced_search', 'CorrespondenciaController@advanced_search')->name('correspondencia.advanced_search');
    Route::get('show_doc/{id}', 'CorrespondenciaController@show_doc')->name('correspondencia.show_doc');
    Route::get('show_txt/{id}', 'CorrespondenciaController@show_txt')->name('correspondencia.show_txt');
});