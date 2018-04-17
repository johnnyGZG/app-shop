<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    // product_image->product
    public function product()
    {
    	// Una Imagen tiene un Producto
    	return $this->belongsTo(Product::class);
    }
}
