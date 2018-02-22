<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Profession::class, function (Faker $faker) {
    return [
        //faker para generar aleatoreo , 3 false para solo 3 palabras
        'title' => $faker->sentence(3, false)
    ];
});
