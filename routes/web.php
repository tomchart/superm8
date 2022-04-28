<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\AdminClubController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;

//// Homepage
Route::get('/', [HomepageController::class, 'show']);
Route::get('/home', [HomepageController::class, 'show']);

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
// Index current clubs
Route::get('/clubs', [ClubController::class, 'index'])->middleware('auth');


//// Club administration
// Create new club
Route::get('/club', [AdminClubController::class, 'create'])->middleware('auth');
Route::post('/club', [AdminClubController::class, 'store'])->middleware('auth');
// Edit club
Route::get('/admin/club/{club:id}/edit', [AdminClubController::class, 'edit'])->middleware(['auth', 'owner']);
Route::patch('/admin/club/{club:id}', [AdminClubController::class, 'update'])->middleware(['auth', 'owner']);
// Delete club
Route::delete('/admin/club/{club:id}', [AdminClubController::class, 'destroy'])->middleware(['auth', 'owner']);


//// Invites
// Create invite
Route::post('/invite/{club:slug}', [InviteController::class, 'store'])->middleware(['auth']);
// View redemption page and redeem
Route::get('/redeem', [InviteController::class, 'show'])->middleware(['auth']);
Route::post('/redeem', [InviteController::class, 'put'])->middleware(['auth']);


//// Account
// Show
Route::get('/account', [AccountController::class, 'show'])->middleware('auth');


//// Watchlist
// Add media to Watchlist

/////////// fix member middleware /////////// 
Route::post('/watchlist/{club:id}', [WatchlistController::class, 'store'])->middleware(['auth', 'media.exists']);
