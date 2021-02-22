<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Countries;
use Faker\Generator as Faker;

$factory->define(Countries::class, function (Faker $faker) {
    return [
        'code'=>$faker->CountryCode,
        'name'=>$faker->Country,
    ];
});
