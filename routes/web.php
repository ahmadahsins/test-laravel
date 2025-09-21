<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/blog', function () {
    return view('blog', [
        'title' => 'Blog',
        'posts' => Post::all()
    ]);
});

Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', [
        'title' => 'Single Post',
        'post' => $post
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact'
    ]);
});

