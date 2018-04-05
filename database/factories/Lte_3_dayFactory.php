<?php

use Faker\Generator as Faker;

$factory->define(App\Lte_3_day::class, function (Faker $faker) {

    return [
        //
    	'serial_number' => mt_rand(100000, 999999),
        'pin' => str_random(10),
        'availability' => '0',
    ];
});
