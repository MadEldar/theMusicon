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
// home
Route::get('/', 'WebController@home');
Route::get('/albums', 'WebController@albums');
Route::get('/events', 'WebController@events');
Route::get('/news', 'WebController@news');
Route::get('/contacts', 'WebController@contacts');
Route::get('/elements', 'WebController@elements');
Route::get('/login', 'WebController@login');
Route::get('/register', 'WebController@register');
//admin
Route::get('/administrator', 'AdminController@admin');
Route::get('/administrator/table', 'AdminController@table');
Route::get('/administrator/artist', 'AdminController@artist');
Route::get('/administrator/albums', 'AdminController@albums');
Route::get('/administrator/song', 'AdminController@song');



