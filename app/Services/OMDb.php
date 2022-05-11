<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\OmdbInfo;


class OMDb
{
    public function searchTitle(String $title)
    {
        // search for $title 
        $response = Http::get(config('services.omdb.base_uri'), [
            'apikey' => config('services.omdb.key'),
            't' => $title,
        ]);

        // create OmdbInfo from $response
        $OmdbInfo = new OmdbInfo($this->parse($response->object()));
        return $OmdbInfo;
    }
    protected function parse($response)
    {
        $omdbArray = [];

        // store rotten tomatoes rating if exists
        if ($response->Ratings) {
            foreach ($response->Ratings as $rating) {
                if ($rating->Source == 'Rotten Tomatoes') {
                    $omdbArray["rottenTomatoesRating"] = $rating->Value;
                };
            };
        }

        // loop over response, dropping Ratings, and store in array
        foreach ($response as $key => $value) {
            if ($key != "Ratings") {
                $omdbArray[$key] = $value;
            };
        }
        return $omdbArray;
    }
}
