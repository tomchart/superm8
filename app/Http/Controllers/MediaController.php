<?php

namespace App\Http\Controllers;

use App\Models\Media;

class MediaController extends Controller
{
    public function show(Media $media)
    {
        return view('media.show', [
            'media' => $media,
        ]);
    }
}
