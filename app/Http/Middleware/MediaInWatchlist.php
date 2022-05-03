<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Watchlist;

class MediaInWatchlist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $watchlist = Watchlist::where('id', '=', request('watchlist_id'))->first();

        if ($watchlist->media->contains($request->media)) {
            return back()->with('error', 'This media already exists in your watchlist.');
        }

        return $next($request);
    }
}
