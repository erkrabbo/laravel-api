<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Admin\User_infos;
use Faker\Generator as Faker;

$factory->define(User_infos::class, function (Faker $faker) {
    $availables = User::select('id')->inRandomOrder()->limit(10)->get();
    function getRandomUniqueId() {

    };
    return [
        'user-id' => $this->getRandomUniqueId(),
        'address' => $faker->address(),
        'phone' => $faker->phoneNumber(),
        'birth' => $faker->date()
    ];
});
