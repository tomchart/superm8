<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ClubCommentController extends Controller
{
    public function store(Club $club)
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

        $club->comments()->create([
            'user_id' => auth()->user()->id,
            'club_id' => $club->id,
            'body' => $attributes['body']
        ]);

        return redirect(url()->previous() . '#comments')->with('success', 'Comment posted!');
    }
}
