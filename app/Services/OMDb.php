<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class OMDb
{
    public function searchTitle(String $title)
    {
        // search for $title and return result
        $response = Http::get(config('services.omdb.base_uri'), [
            'apikey' => config('services.omdb.key'),
            't' => $title,
        ]);
        return $response->object();
    }
}
