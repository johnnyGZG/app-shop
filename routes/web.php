<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', 'TestController@welcome');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
