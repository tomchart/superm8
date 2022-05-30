<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\MediaApi;
use App\Models\Rating;

class FetchMissingMediaInfo
{
    /**
     * Create a new class instance.
     *
     * @param  \App\Contracts\MediaApi  $mediaAPI
     * @return void
     */
    public function __construct(MediaApi $mediaAPI)
    {
        $this->mediaAPI = $mediaAPI;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // not quite working - need to instantiate MediaApi rather than expect it as a var
    public function handle(Request $request, Closure $next)
    {
        if (!$request->media) {
            // validate search data
            $attributes = $this->validateSearch();

            $media = $this->mediaAPI->searchTitle($attributes['search']);

            // return rating from table
            $media->rating()->associate(Rating::where('id', '=', $attributes['rating_ebert'])->first());
            $media->save();
            // merge newly created media model to request array
            $request->merge(['media' => $media]);
            return $next($request);
        } else {
            // exists, do nothing?
            return $next($request);
        };
        return $next($request);
    }
    protected function validateSearch()
    {
        return request()->validate([
            'search' => ['required', 'max:255'],
            'type_id' => [],
            'rating_ebert' => [],
        ]);
    }
}
