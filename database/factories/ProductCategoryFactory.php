<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\ProductCategory;
use Faker\Generator as Faker;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'msrp' => $faker->randomNumber(3),
    ];
});
