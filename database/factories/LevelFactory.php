<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Level;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {
    return [
        'level' => $faker->randomElement(['project owner', 'project leader', 'junior developer', 'medior developer', 'senior developer']),
    ];
});
