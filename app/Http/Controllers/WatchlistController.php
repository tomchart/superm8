<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Watchlist;

class WatchlistController extends Controller
{
    public function store(Request $request, Watchlist $watchlist)
    {
        $media = $this->findMediaIfExists($request);
        $watchlist = Watchlist::where('id', '=', $request->watchlist_id)->first();

        if ($media != false) {
            $watchlist->media()->attach([$media->id, $watchlist->id]);
            return back();
        } else {
            dd('media does not exist');
        }
    }

    protected function findMediaIfExists(Request $request)
    {
        $media_input_name = strtolower($request->name);
        $media_input_type = $request->type_id;
        $media = Media::where('name', '=', $media_input_name)->where('type_id', '=', $media_input_type);
        if ($media->count() > 0) {
            return $media->first();
        } else {
            return false;
        }
    }
}
