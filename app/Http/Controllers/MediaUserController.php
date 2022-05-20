<?php

namespace App\Http\Controllers;

use App\Jobs\ProfileRemoveWatchedUpdateWatchlist;
use App\Jobs\UpdateWatchedProfile;
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
        if (!$user->media->contains($match->id)) {
            $user->media()->attach($match);
            UpdateWatchedProfile::dispatch($user, $match);
            return back()->with('success', 'media added');
        } else {
            return back()->with('error', 'already watched!');
        }
    }

    public function destroy(User $user, Media $media)
    {
        $user->media()->detach($media);
        ProfileRemoveWatchedUpdateWatchlist::dispatch($user, $media);
        return back()->with('alert', 'media removed');
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
