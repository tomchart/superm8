<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Services\MediaAPI;
use Illuminate\Validation\ValidationException;

class MediaController extends Controller
{
    public function show(Media $media)
    {
        return view('media.show', [
            'media' => $media,
        ]);
    }

    public function store(MediaAPI $mediaAPI)
    {
        // validate name
        request()->validate(['name' => ['required', 'max:255']]);

        // search for request()->name, store result
        try {
            $mediaAPI->searchTitle(request('name'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'name' => 'This name could not be searched.'
            ]);
        }

        return back();
    }
}
