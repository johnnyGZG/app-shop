<?php

	Route::get('/products', 'ProductController@index'); // listado
	Route::get('/products/create', 'ProductController@create'); // formulario
	Route::post('/products', 'ProductController@store'); // registrar
	Route::get('/products/{id}/edit', 'ProductController@edit'); // formulario edicion
	Route::post('/products/{id}', 'ProductController@update'); // actualizar
	Route::delete('/products/{id}', 'ProductController@destory'); // Eliminar

	Route::get('/products/{id}/images', 'ImageController@index'); // listado
	Route::post('/products/{id}/images', 'ImageController@store'); // Registrar
	Route::delete('/products/{id}/images', 'ImageController@destroy'); // Eliminar