<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InviteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});
Route::get('/home', function () {
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
Route::get('/club/{club:slug}', [ClubController::class, 'show'])->middleware(['auth', 'member']);
// View new club page & create new club
Route::get('/club', [ClubController::class, 'create'])->middleware('auth');
Route::post('/club', [ClubController::class, 'store'])->middleware('auth');


//// Invites
// Create invite
Route::post('/invite/{club:slug}', [InviteController::class, 'store'])->middleware(['auth']);
// View redemption page and redeem
Route::get('/redeem', [InviteController::class, 'show'])->middleware(['auth']);
Route::post('/redeem', [InviteController::class, 'put'])->middleware(['auth']);


//// Account
// Show
Route::get('/account', [AccountController::class, 'show'])->middleware('auth');
