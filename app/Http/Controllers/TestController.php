<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function welcome()
    {
    	// listar todos los productos
    	$products = Product::paginate(9);

    	// Inyectar datos de Productos en un array asociativo
    	return view('welcome')->with(compact('products')); 
    }
}
