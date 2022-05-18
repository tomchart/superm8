<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Exception;
use Illuminate\Validation\ValidationException;

class MediaCommentController extends Controller
{
    public function store(Media $media)
    {
        try {
            $attributes = request()->validate([
                'body' => ['required', 'max:255']
            ]);
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'comment' => 'Comment must not be longer than 255 characters.'
            ]);
        }

        $media->comments()->create([
            'user_id' => auth()->user()->id,
            'media_id' => $media->id,
            'body' => $attributes['body']
        ]);

        return redirect(url()->previous().'#comments')->with('comment', 'posted!');

    }
}
