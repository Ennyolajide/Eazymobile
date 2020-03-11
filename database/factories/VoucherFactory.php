<?php

use Faker\Generator as Faker;

$factory->define(App\Voucher::class, function (Faker $faker) {
    return [
        //
        'voucher' => $faker->numberBetween(1234567891,9019919100),
        'amount'   => $faker->numberBetween(1,20).'000',
    ];

});
