<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
use App\product_image;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
    	factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(product_image::class, 200)->create();
        */

        // Se crean 5 categorias gracias al facoty
        $categories = factory(Category::class, 4)->create();

        // Se recorre cada categoria creada
        $categories->each(function ($category) {

            // Se crean 20 productos asociada a la categoria 
            $products = factory(Product::class, 5)->make();

            // Se crean los productos con la ralacion con la cateoria
            $category->products()->saveMany($products);

            // Se recorren los 20 productos creados para cada categoria
            $products->each(function ($p){

                // Se generan 50 imagenes por producto
                $images = factory(product_image::class, 3)->make();

                // Se guardan las 50 imagenes ya relacionadas con cada producto
                $p->images()->saveMany($images);
            });
        });
    }
}
