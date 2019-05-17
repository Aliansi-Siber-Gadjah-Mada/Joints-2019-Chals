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

Route::group(["middleware" => "auth"], function(){
    Route::get('/', 'CatalogController@index');
    Route::post('/buy/{slug}', 'CatalogController@buy');
    Route::get('/buy/flag', 'CatalogController@getFlag');
});



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
