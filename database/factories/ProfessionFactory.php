<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Profession;

$factory->define(Profession::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
