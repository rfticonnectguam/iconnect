<?php

use Faker\Generator as Faker;

$factory->define(App\Prepaid_5::class, function (Faker $faker) {
    return [
   	     //
    	'serial_number' => mt_rand(100000, 999999),
        'pin' => strtoupper(str_random(10)),
        'availability' => '0',
    ];
});
