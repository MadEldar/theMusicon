<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('administrator')->middleware('check_role')->group(function () {
    include_once("admin.php");
});

Route::prefix('user')->middleware('check_role')->group(function () {
    include_once("user.php");
});

//Home
Route::get('/', 'WebController@home');
Route::get('/genres', 'WebController@genres');
Route::post('/more-genres', 'WebController@more_genres');
Route::get('/artists', 'WebController@artists');
Route::get('/artist/{id}', 'WebController@artist');
Route::post('/more-artists', 'WebController@more_artists');
Route::get('/albums', 'WebController@albums');
Route::get('/album', 'WebController@redirect_album');
Route::post('/more-albums', 'WebController@more_albums');
Route::get('/player', 'WebController@player');
Route::post('/more-lyrics', 'WebController@more_lyrics');

Route::get('/search', 'WebController@search');
Route::get('/events', 'WebController@events');
Route::get('/news', 'WebController@news');
Route::get('/contacts', 'WebController@contacts');
Route::get('/elements', 'WebController@elements');

//User
Route::get('/sign-in', 'WebController@sign_in_view');
Route::post('/sign-in', 'WebController@sign_in');
Route::get('/sign-up', 'WebController@sign_up_view');
Route::post('/sign-up', 'WebController@sign_up');
Route::get('/sign-out', 'WebController@sign_out');
Route::get('/verify/{token}', 'WebController@verify');

