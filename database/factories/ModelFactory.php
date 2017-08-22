<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'perfil' => rand(1,4),
        'status' => rand(0,1),
    ];
});


$factory->define(App\Fornecedor::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'endereco' => $faker->sentence(4, false, 6),
        'cnpj' => rand(1, 9999999999),
        'telefone' => rand(1, 9999999999)
    ];
});

$factory->define(App\Estoque::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->sentence,
        'descricao' => $faker->paragraph,
        'preco' => rand(1, 100000),
        'quantidade' => rand(1, 100000),
        'fornecedor_id' => factory('App\Fornecedor')->create()->id,
    ];
});

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => rand(1,9999999999),
        'endereco' => $faker->sentence(4, false, 6),
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(App\Produto::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => rand(1,9999999999),
        'endereco' => $faker->sentence(4, false, 6),
        'email' => $faker->unique()->safeEmail,
    ];
});