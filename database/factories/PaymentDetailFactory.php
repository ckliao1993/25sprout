<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\PaymentDetail;
use Faker\Generator as Faker;

$factory->define(PaymentDetail::class, function (Faker $faker) {
    return [
        'payment_id' => $faker->randomNumber(),
        'detail' => $faker->randomElement(Product::all())['id'],
        'quantity' => $faker->randomNumber(2),
        'subtotal' => $faker->randomNumber(3),
    ];
});
