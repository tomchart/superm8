<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;

class WatchlistController extends Controller
{
    public function store(Watchlist $watchlist)
    {
        $watchlist->media()->attach(request('media'), ['watchlist_id' => request('watchlist_id')]);
        return back();
    }
}
