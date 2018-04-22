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

    // accessor
    public function getUrlAttribute()
    {
    	if(substr($this->image, 0, 4) === "http") 
    	{
    		return $this->image;
    	}

    	return '/images/products/' . $this->image;
    }
}
