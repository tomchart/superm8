<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\AdminClubController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MediaWatchlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;

//// Homepage
Route::get('/', [HomepageController::class, 'show']);
Route::get('/home', [HomepageController::class, 'show']);

// Sessions
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');


//// Clubs
// View detail page
Route::get('/club/{club:slug}', [ClubController::class, 'show'])->middleware(['auth', 'member']);
// Index current clubs
Route::get('/clubs', [ClubController::class, 'index'])->middleware(['auth']);


//// Club administration
// Create new club
Route::get('/club', [AdminClubController::class, 'create'])->middleware('auth');
Route::post('/club', [AdminClubController::class, 'store'])->middleware('auth');
// Edit club
Route::get('/admin/club/{club:id}/edit', [AdminClubController::class, 'show'])->middleware(['auth', 'owner']);
Route::patch('/admin/club/{club:id}', [AdminClubController::class, 'update'])->middleware(['auth', 'owner']);
// Delete club
Route::delete('/admin/club/{club:id}', [AdminClubController::class, 'destroy'])->middleware(['auth', 'owner']);


//// Invites
Route::middleware('auth')->group(function () {
    Route::post('/invite/{club:slug}', [InviteController::class, 'store']);
    Route::get('/redeem', [InviteController::class, 'show']);
    Route::post('/redeem', [InviteController::class, 'put']);
});


//// Account
// Show
Route::get('/account', [AccountController::class, 'show'])->middleware('auth');

//// Profile
// Show
Route::get('/profile/{user:username}', [ProfileController::class, 'show']);
Route::post('/profile/{auth:user:username}', [ProfileController::class, 'update'])->middleware(['auth', 'media.exists']);


//// Watchlist
// Create new watchlist
Route::post('/watchlist/{club:id}/create', [WatchlistController::class, 'create'])->middleware(['auth', 'member']);
// Add media to Watchlist
Route::post('/watchlist/{club:id}', [WatchlistController::class, 'update'])->middleware(['auth', 'media.exists', 'media.watchlist', 'member']);


//// Media watchlist
// Mark as watched

// fix middleware again
Route::patch('/watchlist/{watchlist:id}/{media:id}', [MediaWatchlistController::class, 'update'])->middleware(['auth']);
Route::delete('/watchlist/{watchlist:id}/{media:id}', [MediaWatchlistController::class, 'destroy'])->middleware(['auth']);
