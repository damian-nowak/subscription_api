<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Domain\Subscriptions\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'name' => ucwords($faker->words(2, true))
    ];
});
