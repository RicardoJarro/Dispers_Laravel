<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'nombre' => $faker->userName,
        'slug' => $faker->userName,
        'category_id' =>$faker->numberBetween($min = 1, $max = 4),
        'descripcion'=> $faker->text($maxNbChars = 200),
        'peso'=> $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),// 48.8932,
        'stock'=>$faker->numberBetween($min = 10, $max = 300),
        'precio'=>$faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 100),
        //'estado'=> '1',
    ];
});
