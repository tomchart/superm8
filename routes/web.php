<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClubController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

//// Sessions

// Register
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Login
Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

// Logout
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');


//// Clubs
// View detail page
Route::get('/club/{club:slug}', [ClubController::class, 'show'])->middleware('auth');
