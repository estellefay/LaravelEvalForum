<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Commentaire;
use Faker\Generator as Faker;

$factory->define(Commentaire::class, function (Faker $faker) {
    return [
        //
        'content'=>$faker->text($maxNbChars = 200),
        'topic_id'=>$faker->numberBetween($min = 1, $max = 20),
        
    ];
});
