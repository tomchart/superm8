<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\OMDb;

class FetchMissingOmdbInfo
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
        if (!$request->media->omdb()->exists()) {
            // does not exist, fetch & store omdb_info
            $omdb = new OMDb;
            $omdbInfo = $omdb->searchTitle($request->media->name);

            $request->media->omdb()->save($omdbInfo);
            $omdbInfo->save();
        } else {
            // exists, do nothing?
            return $next($request);
        };
        return $next($request);
    }
}
