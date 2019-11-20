<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    
    return [
        'role' => $faker->randomElement(['project owner', 'project leader', 'senior developer', 'medior developer', 'junior developer'])
    ];
});
