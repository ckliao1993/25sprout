<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\PaymentDetail;
use Faker\Generator as Faker;

$factory->define(PaymentDetail::class, function (Faker $faker) {
    return [
        'payment_id' => $faker->randomNumber(),
        'detail' => $faker->randomNumber(1),
        'quantity' => $faker->randomNumber(2),
        'subtotal' => $faker->randomNumber(3),
    ];
});
