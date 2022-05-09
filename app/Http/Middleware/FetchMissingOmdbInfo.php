<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\OMDb;
use App\Models\OmdbInfo;

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
            $response = $omdb->searchTitle($request->media->name);

            // extract rotten tomatoes rating
            $rt_rating = null;
            foreach ($response->Ratings as $rating) {
                if ($rating->Source == 'Rotten Tomatoes') {
                    $rt_rating = $rating->Value;
                };
            };

            // tv returns a different format - need a policy to define expected data returned?
            // otherwise erroring as not all keys exist in array and currently assuming they do
            $omdbInfo = new OmdbInfo([
                "title" => $response->Title,
                "year" => $response->Year,
                "rated" => $response->Rated,
                "released" => $response->Released,
                "runtime" => $response->Runtime,
                "genre" => $response->Genre,
                "director" => $response->Director,
                "writer" => $response->Writer,
                "actors" => $response->Actors,
                "plot" => $response->Plot,
                "language" => $response->Language,
                "country" => $response->Country,
                "awards" => $response->Awards,
                "poster" => $response->Poster,
                "rotten_tomatoes_rating" => $rt_rating,
                "metascore" => $response->Metascore,
                "imdb_rating" => $response->imdbRating,
                "imdb_votes" => $response->imdbVotes,
                "imdb_id" => $response->imdbID,
                "type" => $response->Type,
                "dvd" => $response->DVD,
                "box_office" => $response->BoxOffice,
                "production" => $response->Production,
                "website" => $response->Website,
                "response" => $response->Response,
            ]);
            $request->media->omdb()->save($omdbInfo);
            $omdbInfo->save();
        } else {
            // exists, do nothing?
            return $next($request);
        };
        return $next($request);
    }
}
