<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Infrastructure\Clients\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email
    ];
});
