<?php

use App\User;
use App\Model\Question;
use Faker\Generator as Faker;

$factory->define(App\Model\Reply::class, function (Faker $faker) {
    return [
        'body'          =>  $faker->text,
        'question_id'   =>  Question::all()->random(),
        'user_id'       =>  User::all()->random()           
    ];
});
