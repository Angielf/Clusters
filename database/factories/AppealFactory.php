<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Appeal::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 800),
        'fio' => $faker->name,
        'class' => '11 Б',
        'subject' => 'математика',
        'status' => 'Рассмотрение'
    ];
});
