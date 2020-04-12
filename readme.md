<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About
theMusicon is a web-based application using PHP Laravel 7.0 integrating with 3 different APIs, namely Spotify, LastFM
and Genius to create the simplest and the best users' experience.

## What we accomplished
1. Using Spotify API to lead the user between music genres, tracks, albums and artists.
2. Using Genius API to help users search for their preferred choices in lyrics.
3. Using LastFM API for the in-depth information about users' favourite artists.
4. A complete experience in listening to music.

## What we lack
1. Users' interaction after account creation.
2. Each API covers what the other lacks, but cannot fully integrate.

## Admin privilege
When the console first runs Laravel's seeding command `php artisan db:seed`, an admin account will be created with the
following credentials:

Email: admin@theMusicon.com

Password: *`d9a5a080fea1`*

User can then proceed to route "/administrator/home" to access admin's privileges.

![Navbar](./public/musicon/img/navigation-bar.png)

Note: The admin's abilities to manage to website and database is still lacking. 

## Final words
This is the Dynamic Websites module's assignment for FPT Aptech. We're happy that we were able to experience new features,
especially using APIs for the first time. Although we still lack many functions due to a lack of time, we're proud to call
this one of our big leaps in website designs.
