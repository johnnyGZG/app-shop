<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word), // Colocar primera letra de la palabra en mayuscula
        'description' => $faker->sentence(10)
    ];
});
