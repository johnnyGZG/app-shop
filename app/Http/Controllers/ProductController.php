<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() // listado
    {
        // lista todos los productos y los pagina de 10 en 10
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));
    }

    public function create() // formulario
    {
    	return view('admin.products.create');
    }

    public function store(Request $request) // registrar
    {
    	// Mostrar infomacion y ternimar la ejecucion del programa en un instante deseado
        // $request->all() devuelve todos los datos ingresado en el formulario
        // dd($request->all());

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->save(); // Ejecuta un INSERT en la tabla Products

        return redirect('/admin/products');
    }

    public function edit($id) // formulario edicion
    {
        // dd('Mostrar el formulario de edicion para el producto con ID '.$id);
        // Busca el producto por id
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id) // actualizar
    {
        // Mostrar infomacion y ternimar la ejecucion del programa en un instante deseado
        // $request->all() devuelve todos los datos ingresado en el formulario
        // dd($request->all());

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->save(); // Ejecuta un UPDATE en la tabla Products

        return redirect('/admin/products');
    }

    public function destory($id) // Eliminar
    {
        // Mostrar infomacion y ternimar la ejecucion del programa en un instante deseado
        // $request->all() devuelve todos los datos ingresado en el formulario
        // dd($request->all());

        $product = Product::find($id);
        $product->delete(); // Ejecuta un DELETE en la tabla Products

        // Redireccionar a la pagina que estaba el usuario anteriormente
        return back();
    }
}
