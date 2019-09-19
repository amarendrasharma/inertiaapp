<?php

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/about', function () {
    return Inertia::render('About');
});
Route::get('/contact', function () {
    return Inertia::render('Contact');
});

Route::post('/logout', function () {
    Auth::logout();
});

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
