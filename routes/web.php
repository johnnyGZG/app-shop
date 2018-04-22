<?php


Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show'); // listado

// Se aplican dos middleware el de auth (por defecto en Laravel) y admin (Creado por comando)
// Se Agrega un prefix texto en comun para el inicio de la rutas del administrador
/* Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
	require_once(__DIR__."/admin/products.php");
}); */

Route::group([
	'namespace'		=>	'Admin',
	'prefix'		=>	'admin',
	'middleware'	=> 	['auth', 'admin']
], function () {
	require_once(__DIR__."/admin/products.php");
});

// PUT PATCH DELETE