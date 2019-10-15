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
    return view('addquotes');
});

Route::post('/citas','EventController@create')->name('citas');

Route::get('/cancel','EventController@show');
Route::delete('/cancel/{id}','EventController@destroy')->name('destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/status{id}','EventController@edit')->name('status');

Route::get('/status/{id}','EventController@update')->name('statusedit');

Route::resource('supports','SupportController');