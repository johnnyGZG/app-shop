<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // $product->category
    public function category()
    {
    	// Un Producto tiene una categoria
    	return $this->belongsTo(Category::class);
    }

    // $product->images
    public function images()
    {
    	// Un Producto tiene muchas imagenes
    	return $this->hasMany(product_image::class);
    }
}
