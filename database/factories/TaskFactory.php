<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'logradouro'=>$faker->streetName,
        'bairro'=>$faker->address,
        'municipio'=>$faker->city,
        'estado'=>$faker->state,
        'cep'=>$faker->numerify('########'),
        'tipo_imovel'=>$faker->randomDigit,
        'nome_prop'=>$faker-> name,
        'cpf'=>$faker->numerify('###########')
    ];
});
