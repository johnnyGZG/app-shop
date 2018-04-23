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

    public function getFeaturedImageUrlAttribute()
    {
        // Busca en la relacion con la tabla products_image si es destacada en el producto
        $featuredImage = $this->images()->where('featured', true)->first();
        if (!$featuredImage)
        {
            // Si no hay destacado definido, devuelve el primer registro encontrado
            $featuredImage = $this->images()->first();
        }

        if ($featuredImage)
        {
            // si existe destacado devuelve url de la imagen
            // url es un campo calculado definido del modelo product_image
            return $featuredImage->url;
        }

        // default
        return '/images/default_product.png';
    }
}
