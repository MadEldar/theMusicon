<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Genre::class, function (Faker $faker) {
    // Q: 20
    return [
        'genre_name' => $faker->name,
        'genre_status' => 1
    ];
});

$factory->define(\App\Artist::class, function (Faker $faker) {
    // Q: 20
    return [
        'artist_name' => $faker->name,
        'artist_description' => $faker->sentence(20),
        'artist_thumbnail' => $faker->imageUrl(600, 600),
        'genre_id' => $faker->numberBetween(1, 20),
        'career_start' => $faker->dateTimeBetween('-10 years'),
    ];
});

$factory->define(\App\Album::class, function (Faker $faker) {
    // Q: 100
    $artist = \App\Artist::find($faker->numberBetween(1, 20));
    $covers = [
        'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/album-cover-design-template-c371e7b0504a63f89802d5e7bd491950_screen.jpg?ts=1567445462',
        'https://img0-placeit-net.s3-accelerate.amazonaws.com/uploads/stage/stage_image/21198/optimized_large_thumb_stage.jpg',
        'https://i.redd.it/uqerkjxpqcf31.jpg',
        'https://about.canva.com/wp-content/uploads/sites/3/2015/01/album-cover.png',
        'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/artistic-album-cover-design-template-d12ef0296af80b58363dc0deef077ecc_screen.jpg?ts=1561488440',
        'https://99designs-blog.imgix.net/blog/wp-content/uploads/2018/09/attachment_67353774.png?auto=format&q=60&fit=max&w=930',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQM98aCH7m-atLiSup44qmYvvSzjJNf0VVSBF0shvrYF3H_BzuT&usqp=CAU',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTCD5QYN8rNJ1HS-8CwKWkTvA0Vmd2rCxN-cVFRLM0SW4SWGMr4&usqp=CAU',
        'https://pbs.twimg.com/media/ESNjJRnXsAAW4zO.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ_2T_zbTYVODjwfVJtICe3mDS3g_qsISUrwJbzJ8BE9FnUf_Jv&usqp=CAU',
        'https://d2s36jztkuk7aw.cloudfront.net/sites/default/files/tile/image/RubberSoul_1.jpg',
        'https://datjoblessboi.com/data/campaigns/2018/10/Spinall-Iyanu-Front-Cover-1.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRrLIarMT52Em4RNPOPpNQlq1ka9iZWoEsZJH-Fr9e-yA6QneZp&usqp=CAU'
    ];
    return [
        'album_name' => $faker->colorName,
        'genre_id' => $artist->genre_id,
        'artist_id' => $artist->id,
        'album_status' => 1,
        'album_thumbnail' => $covers[array_rand($covers)],
        'release_date' => $faker->dateTimeBetween('-10 years'),
    ];
});

$factory->define(\App\Song::class, function (Faker $faker) {
    // Q: 1000
    $album = \App\Album::find($faker->numberBetween(1, 100));
    return [
        'song_name' => $faker->firstName(),
        'genre_id' => $album->genre_id,
        'artist_id' => $album->artist_id,
        'album_id' => $album->id,
        'song_ordinal' => $album->Songs->last()->song_ordinal + 1,
        'song_status' => 1,
        'release_date' => $album->release_date,
    ];
});
