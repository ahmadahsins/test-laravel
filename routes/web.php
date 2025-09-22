<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Home Routes
Route::get('/', [HomeController::class, 'index']);

// Blog Routes
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/post/{post:slug}', [BlogController::class, 'show']);

// Contact Route
Route::get('/contact', [ContactController::class, 'index']);

