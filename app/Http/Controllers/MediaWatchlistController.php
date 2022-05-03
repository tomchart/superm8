<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\Media;

class MediaWatchlistController extends Controller
{
    public function update(Watchlist $watchlist, Media $media)
    {
        $watchlist->media()->updateExistingPivot($media->id, ['watched' => request()->inverse_status]);
        // refactor this
        if (request()->inverse_status) {
            foreach ($watchlist->club->users as $user) {
                if ($user->watched->where('id', $media->id)->count() == 0) {
                    $user->watched()->attach($media);
                };
            };
        } else {
            foreach ($watchlist->club->users as $user) {
                if ($user->watched->where('id', $media->id)->count() > 0) {
                    $user->watched()->detach($media);
                };
            };
        };
        return redirect(url()->previous() . '#list');
    }
}
