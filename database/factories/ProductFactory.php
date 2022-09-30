<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category' => $faker->word,
        'size' => $faker->randomNumber(2),
        'color' => $faker->colorName,
        'stock' => $faker->randomNumber(2),
    ];
});
