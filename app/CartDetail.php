<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class CartDetail extends Model
{
    public function product()
    {
    	// Un Carrillo detalle tiene un producto asociado
    	return $this->belongsTo(Product::class);
    }
}
