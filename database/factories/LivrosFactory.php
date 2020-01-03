<?php

use Faker\Generator as Faker;

$factory->define(\App\Livro::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'subtitulo'=> $faker->name,
        'autor' => $faker->name,
        'ano_lancamento' => $faker->dateTimeThisMonth()->format('d-m-Y H:i:s'),
    ];
});



