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
//web

Route::get('/', 'WebController@home');
Route::get('/albums', 'WebController@albums');
Route::get('/events', 'WebController@events');
Route::get('/news', 'WebController@news');
Route::get('/contacts', 'WebController@contacts');
Route::get('/elements', 'WebController@elements');
Route::get('/player-music', 'WebController@playerMusic');
Route::get('/artist', 'WebController@');


//user

Route::get('/login', 'UserController@login');
Route::get('/register', 'UserController@register');
Route::get('/information', "UserController@information");

//admin
Route::get('/administrator', 'AdminController@admin');
Route::get('/administrator/table', 'AdminController@table');
Route::get('/administrator/artist', 'AdminController@artist');
Route::get('/administrator/albums', 'AdminController@albums');
Route::get('/administrator/song', 'AdminController@song');


Route::get('/admin', fn() => redirect('/admin/home'));
Route::get('/admin/home', function () {
    return view('admin/index');
});
Route::get('/home', function () {
    return view('musicon/index');
});
Route::get('/api-test', 'MusiconController@search');
