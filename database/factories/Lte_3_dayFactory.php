<?php

use Faker\Generator as Faker;

$factory->define(App\Lte_3_day::class, function (Faker $faker) {

    return [
        //
    	'serial_number' => mt_rand(100000000000, 999999999999),
        'pin' => strtoupper(str_random(10)),
        'availability' => '0',
    ];
});
