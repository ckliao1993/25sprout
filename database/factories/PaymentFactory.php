<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'total' => $faker->randomNumber(4),
        'status' => $faker->randomElement(array('new', 'processing', 'finished')),
        'user' => $faker->name,
    ];
});
