<?php

use App\Post;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::get('/', function () {
    $posts = Post::with(['category', 'user'])->get();
    return Inertia::render('Home', compact('posts'));
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
Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('can:edit-post,post');
Route::post('/posts/{post}/update', 'PostController@update')->middleware('can:edit-post,post');
Route::delete('/posts/{post}/delete', 'PostController@destroy')->middleware('can:edit-post,post');
Route::post('/posts/image/{post}/delete', 'PostController@imageDelete');


Route::get('/home', function () {
    return Inertia::render('Home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
