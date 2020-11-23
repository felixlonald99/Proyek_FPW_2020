<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GuestModel;
use Faker\Generator as Faker;

$factory->define(GuestModel::class, function (Faker $faker) {
    $nama = $faker->name;
    $phone = "+628".$faker->unique()->numberBetween(100000000, 99999999999);
    return [
        'name' => $nama,
        'email' => $faker->email,
        'password' => 'dummypassword',
        'phone' => $phone,
        'saldo' => 0,
        'status' => 0,
        'birthdate' => $faker->dateTimeBetween("-70 years", "-20 years"),
    ];
});
