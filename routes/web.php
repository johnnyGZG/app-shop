<?php


Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/products', 'ProductController@index'); // listado
Route::get('/admin/products/create', 'ProductController@create'); // formulario
Route::post('/admin/products', 'ProductController@store'); // registrar

Route::get('/admin/products/{id}/edit', 'ProductController@edit'); // formulario edicion
Route::post('/admin/products/{id}', 'ProductController@update'); // actualizar

Route::delete('/admin/products/{id}', 'ProductController@destory'); // Eliminar