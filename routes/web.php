<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\AdminClubController;
use App\Http\Controllers\ClubCommentController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MediaWatchlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\ClubUserController;
use App\Http\Controllers\MediaCommentController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MediaUserController;
use Illuminate\Support\Facades\Route;

//// Homepage
Route::get('/', [HomepageController::class, 'show']);
Route::get('/home', [HomepageController::class, 'show']);


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
// Remove user from club
Route::delete('/admin/club/{club:id}/{user:id}', [ClubUserController::class, 'destroy'])->middleware(['auth', 'owner']);


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
Route::patch('/profile/{user:username}', [ProfileController::class, 'update'])->middleware('auth');

//// Media User
Route::post('/profile/{user:username}/media', [MediaUserController::class, 'store'])->middleware(['auth', 'media.exists', 'fetch.media']);
Route::delete('/profile/{user:username}/{media:id}', [MediaUserController::class, 'destroy'])->middleware('auth');

//// Media
Route::get('/media/{media:id}', [MediaController::class, 'show'])->middleware(['auth', 'fetch.media']);
Route::get('/search', [MediaController::class, 'index'])->name('search');


//// Watchlist
// Create new watchlist
Route::post('/watchlist/{club:id}/create', [WatchlistController::class, 'create'])->middleware(['auth', 'member']);
// Delete watchlist
Route::delete('/watchlist/{club:id}/{watchlist:id}/remove', [WatchlistController::class, 'destroy'])->middleware(['auth', 'owner']);
// Add media to Watchlist
Route::post('/watchlist/{club:id}', [WatchlistController::class, 'update'])->middleware(['auth', 'media.exists', 'media.watchlist', 'fetch.media', 'member']);


//// Media watchlist
// Mark as watched
// fix middleware again
Route::patch('/watchlist/{watchlist:id}/{media:id}', [MediaWatchlistController::class, 'update'])->middleware(['auth']);
Route::delete('/watchlist/{watchlist:id}/{media:id}', [MediaWatchlistController::class, 'destroy'])->middleware(['auth']);


//// Media Comment
Route::post('/media/{media:id}/comment', [MediaCommentController::class, 'store'])->middleware(['auth']);

//// Club Comment
Route::post('/club/{club:id}/comment', [ClubCommentController::class, 'store'])->middleware(['auth']);

require __DIR__ . '/auth.php';
