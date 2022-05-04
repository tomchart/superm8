<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\Media;

class MediaWatchlistController extends Controller
{
    public function update(Watchlist $watchlist, Media $media)
    {
        $watchlist->media()->updateExistingPivot($media->id, ['watched' => request()->inverse_status]);
        return redirect(url()->previous() . '#list');
    }

    public function destroy(Watchlist $watchlist, Media $media)
    {
        $watchlist->media()->detach($media->id);
        return redirect(url()->previous() . '#list');
    }
}
