<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Client::class, function (Faker $faker) {
    $name=$faker->name;
    return [
        'nombre' => $faker->name,
        'nickname' => $name,
        'slug'=>Str::slug($name),
        'email' => $faker->unique()->safeEmail,
        'rol'=>'cliente',
        'password' => bcrypt('1234'), // password
        'estado'=> '1',
    ];
});
