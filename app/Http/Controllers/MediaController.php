<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Validation\Rule;

class MediaController extends Controller
{
    protected function validateMedia(?Media $media = null): array
    {
        $media ??= new Media();
        return request()->validate([
            'name' => ['required', 'max:255', Rule::unique('media', 'name')->ignore($media->id)],
        ]);
    }
}
