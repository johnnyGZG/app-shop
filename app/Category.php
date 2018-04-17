<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // $category->products
    public function products()
    {
    	// Una Categoria tiene muchos productos
    	return $this->hasMany(Product::class);
    }
}
