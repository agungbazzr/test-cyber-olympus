<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CustomerModel;
use Faker\Generator as Faker;

$factory->define(CustomerModel::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'alamat' => $faker->address,
        'tanggal_registrasi' => now(),
        'nomor_telepon' => $faker->e164PhoneNumber,
        
    ];
});
