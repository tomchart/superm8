<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Watchlist;
use Illuminate\Validation\ValidationException;
use App\Jobs\UpdateWatchedWatchlist;

class WatchlistController extends Controller
{
    public function create(Club $club)
    {
        $attributes = array_merge(request()->validate([
            'name' => ['required', 'max:255'],
        ]), [
            'club_id' => $club->id,
        ]);

        if (!($attributes)) {
            throw ValidationException::withmessages([
                'watchlist' => 'Your watchlist name could not be verified',
            ]);
        }
        Watchlist::create($attributes);
        return back()->with('success', 'Watchlist created for club.');
    }

    public function update(Club $club)
    {
        $watchlist = Watchlist::where('id', '=', request('watchlist_id'))->first();
        $watchlist->media()->attach(request('media'), ['watchlist_id' => request('watchlist_id')]);
        UpdateWatchedWatchlist::dispatch(request('media'), $club, $watchlist);
        return redirect(url()->previous() . '#list');
    }
}
