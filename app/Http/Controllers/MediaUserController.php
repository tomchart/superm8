<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;

class MediaUserController extends Controller
{
    // anyone whos anyone can post to these
    // need a gate or a policy defined for the Models
    // so can limit who can access

    public function store(User $user)
    {
        $user->media()->attach(request()->media);
        return back()->with('success', 'media added');
    }

    public function destroy(User $user, Media $media)
    {
        $user->media()->detach($media);
        return back()->with('success', 'media removed');
    }
}
