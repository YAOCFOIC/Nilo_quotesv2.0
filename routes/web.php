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

Route::resource('/citas','EventController');

Route::get('/addeventurl','EventController@display');

Route::get('/displaydata','EventController@show');

Route::get('/deleteeventurl','EventController@show');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/emailcitas','EventController@create')->name('citas');


