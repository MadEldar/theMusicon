<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('/administrator/home'));
Route::get('/home', 'AdminController@dashboard');
Route::get('/table', 'AdminController@table');
Route::get('/users', 'AdminController@users');
Route::post('/users/edit', 'AdminController@user_edit');
Route::get('/albums', 'AdminController@albums');
Route::get('/song', 'AdminController@song');
