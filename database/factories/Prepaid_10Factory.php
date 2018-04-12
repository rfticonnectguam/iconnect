<?php

use Faker\Generator as Faker;

$factory->define(App\Prepaid_10::class, function (Faker $faker) {
    return [
        //
    	'serial_number' => mt_rand(1000000000, 9999999999),
        'pin' => strtoupper(str_random(10)),
        'availability' => '0',
    ];
});
