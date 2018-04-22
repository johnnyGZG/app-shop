<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\product_image;

class ImageController extends Controller
{
    public function index($id) // Listar
    {
    	$product = Product::find($id);
    	$images = $product->images;
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id) // Registrar
    {
    	// guardar la img en nuestro proyecto
    	$file = $request->file('photo');
    	$path = public_path() . '/images/products';
		$fileName = uniqid() . $file->getClientOriginalName();
		$file->move($path, $fileName);

		// crear  Registro en la tabla product_images
		$productImage = new product_image();
		$productImage->image = $fileName;
		// $productImage->featured = false;
		$productImage->product_id = $id;
		$productImage->save(); // INSERT

		return back();
    }

    public function destroy($id) // Eliminar
    {

    }
}
