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
    return redirect()->route('correspondencia.simple_search', ['id_obra' => 260]);
})->name('home');

Route::get('test', function () {
    return view('test');
})->name('test');

Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::resource('etiquetador', 'EtiquetadorController');

Route::resource('etiqueta', 'ClasificacionController');

Route::group(['prefix' => 'correspondencia'], function () {
    Route::get('etiquetas/{id_obra?}', 'ClasificacionController@index')->name('correspondencia.etiquetas');
    Route::get('/{id_obra?}', 'CorrespondenciaController@simple_search')->name('correspondencia.simple_search');
    Route::get('simple_search/{id_obra?}', 'CorrespondenciaController@simple_search')->name('correspondencia.simple_search');
    Route::get('advanced_search/{id_obra?}', 'CorrespondenciaController@advanced_search')->name('correspondencia.advanced_search');
    Route::get('show_doc/{codigo}', 'DocController@show')->name('correspondencia.show_doc');
    Route::get('show_doc_id/{id}', 'DocController@show_id')->name('correspondencia.show_doc_id');
    Route::get('show_txt/{id}', 'CorrespondenciaController@show_txt')->name('correspondencia.show_txt');
});

Auth::routes();

Route::get('/register_successful', function () {
    Auth::user()->SendEmailActivate();
    Auth::logout();
    return view('auth.register_successful');
});

Route::get('/active', function (\Illuminate\Http\Request $request) {
    return \App\User::active($request->getQueryString());
})->name('active');

Route::get('/user_not_actived', function(){
    return view('auth.user_not_actived');
})->name('user_not_actived');