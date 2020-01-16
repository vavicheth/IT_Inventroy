<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Software;
use Faker\Generator as Faker;

$factory->define(Software::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'version'=>$faker->buildingNumber,
        'last_update'=>$faker->date(),
        'expire_date'=>$faker->date(),
        'description'=>$faker->text(100),
        'active'=>$faker->boolean,
    ];
});
