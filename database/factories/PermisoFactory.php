<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Illuminate\Support\Str;
use App\Models\Admin\Permiso;
use Faker\Generator as Faker;

$factory->define(Permiso::class, function (Faker $faker) {
    $permiso = $faker->unique()->text(10);
    return [
        'nombre' => $permiso,
        'slug' => Str::slug($permiso, '-'),
    ];
});
