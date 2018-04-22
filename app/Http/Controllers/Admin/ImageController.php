<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\product_image;
use File;

class ImageController extends Controller
{
    public function index($id) // Listar
    {
    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured', 'desc')->get(); // Ordenar registros
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id) // Registrar
    {
    	// guardar la img en nuestro proyecto
    	$file = $request->file('photo');
    	$path = public_path() . '/images/products';
		$fileName = uniqid() . $file->getClientOriginalName();
		$moved = $file->move($path, $fileName);

		// crear  Registro en la tabla product_images
		if ($moved) // Validando si el archivo se guardo en la carpeta images
		{
			$productImage = new product_image();
			$productImage->image = $fileName;
			// $productImage->featured = false;
			$productImage->product_id = $id;
			$productImage->save(); // INSERT
		}

		return back();
    }

    public function destroy(Request $request, $id) // Eliminar
    {
    	// eliminar el archivo
    	$productImage = product_image::find($request->image_id);
    	if (substr($productImage->image, 0, 4) === "http")
    	{
    		$delete = true;
    	}
    	else
    	{
    		$fullPath = public_path() . '/images/products/' . $productImage->image;
    		$delete = File::delete($fullPath);
    	}

    	// eliminar el registro de la img en la bd
    	if($delete)
    	{
    		$productImage->delete();
    	}

    	return back();
    }

    public function select ($id, $image)
    {
        // Busca todas las imagenes asociadas a un producto y actuliza su campo para todos los registros encontrados
        product_image::where('product_id', $id)->update([
            'featured' => false
        ]);

        $imageProduct = product_image::find($image);
        $imageProduct->featured = true;
        $imageProduct->save();

        return back();
    }
}
