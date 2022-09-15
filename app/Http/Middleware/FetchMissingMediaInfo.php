<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\MediaApi;
use App\Services\EbertApi;
use App\Models\Rating;

class FetchMissingMediaInfo
{
    /**
     * Create a new class instance.
     *
     * @param  \App\Contracts\MediaApi  $mediaAPI
     * @return void
     */
    public function __construct(MediaApi $mediaAPI, EbertApi $ebertApi)
    {
        $this->mediaAPI = $mediaAPI;
        $this->ebertApi = $ebertApi;
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
            [$link, $ebertRating] = $this->ebertApi->searchTitle($attributes['search']);

            $starsToRatingKeys = [
              "0" => 1,
              "0.5" => 2,
              "1" => 3,
              "1.5" => 4,
              "2" => 5,
              "2.5" => 6,
              "3" => 7,
              "3.5" => 8,
              "4" => 9,
            ];
            $ebertKey = $starsToRatingKeys[$ebertRating];

            // return rating from table
            $media->rating()->associate(Rating::where('id', '=', $ebertKey)->first());
            $media->ebert_review = $link;
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
