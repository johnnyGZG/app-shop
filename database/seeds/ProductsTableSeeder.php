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
    	factory(Category::class, 5)->create();
        factory(Product::class, 100)->create();
        factory(product_image::class, 200)->create();
    }
}
