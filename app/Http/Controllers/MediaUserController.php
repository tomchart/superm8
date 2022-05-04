<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;

class MediaUserController extends Controller
{
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
