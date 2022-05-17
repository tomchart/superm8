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
        $match = $this->findIfExists(request()->name);
        $user->media()->attach($match);
        return back()->with('success', 'media added');
    }

    public function destroy(User $user, Media $media)
    {
        $user->media()->detach($media);
        return back()->with('success', 'media removed');
    }

    protected function findIfExists(String $title)
    {
        $match = Media::search($title)->get()->first();
        // will this actually be falsey if unmatched?
        if ($match) {
            return $match;
        } else {
            return false;
        }
    }
}
