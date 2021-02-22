<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'photo'=>$faker->name,
        'adress'=>$faker->country,
        'phone'=>'01745585656'
    ];
});
