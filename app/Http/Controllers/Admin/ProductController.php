<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        // Validacion
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio valido.',
            'price.min' => 'No se admiten valores negativos.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción corta solo admite hasta 200 caracteres.'
        ];

        $rules = [
            'name'  =>  'required|min:3',
            'price'  =>  'required|numeric|min:0',
            'description'  =>  'required|max:200'
        ];

        $this->validate($request, $rules, $messages);

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

        // Validacion
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio valido.',
            'price.min' => 'No se admiten valores negativos.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción corta solo admite hasta 200 caracteres.'
        ];

        $rules = [
            'name'  =>  'required|min:3',
            'price'  =>  'required|numeric|min:0',
            'description'  =>  'required|max:200'
        ];

        $this->validate($request, $rules, $messages);

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
