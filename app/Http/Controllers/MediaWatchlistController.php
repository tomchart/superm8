<?php

namespace App\Http\Controllers;

use App\Jobs\AddWatchedFromWatchlist;
use App\Models\Watchlist;
use App\Models\Media;

class MediaWatchlistController extends Controller
{
    public function update(Watchlist $watchlist, Media $media)
    {
        $watchlist->media()->updateExistingPivot($media->id, ['watched' => request()->inverse_status]);
        AddWatchedFromWatchlist::dispatch(request()->inverse_status, $watchlist->club, $media);
        if (request()->inverse_status) {
            return redirect(url()->previous() . '#list')->with('success', $media->Title . ' watched');
        } else {
            return redirect(url()->previous() . '#list')->with('alert', $media->Title . ' unwatched');
        }
    }

    public function destroy(Watchlist $watchlist, Media $media)
    {
        $watchlist->media()->detach($media->id);
        return redirect(url()->previous() . '#list');
    }
}
