<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() // listado
    {
    	$products = Product::all();
    	return view('admin.products.index')->with(compact('products'));
    }

    public function create() // formulario
    {
    	return view('admin.products.create');
    }

    public function store() // registrar
    {
    	// return view();
    }
}
