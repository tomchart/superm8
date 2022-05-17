<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Media;


class OMDb implements MediaApi
{
    public function searchTitle(String $title)
    {
        // search for $title 
        $response = Http::get(config('services.omdb.base_uri'), [
            'apikey' => config('services.omdb.key'),
            't' => $title,
        ]);

        // create Media from $response
        $media = new Media($this->parse($response->object()));
        return $media;
    }
    protected function parse($response)
    {
        $mediaArray = [];

        // store rotten tomatoes rating if exists
        if ($response->Ratings) {
            foreach ($response->Ratings as $rating) {
                if ($rating->Source == 'Rotten Tomatoes') {
                    $mediaArray["rottenTomatoesRating"] = $rating->Value;
                };
            };
        }

        // loop over response, dropping Ratings, and store in array
        foreach ($response as $key => $value) {
            if ($key != "Ratings") {
                $mediaArray[$key] = $value;
            };
        }
        return $mediaArray;
    }
}
