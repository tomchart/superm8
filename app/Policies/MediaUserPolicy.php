<?php

namespace App\Policies;

use App\Models\Media;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function store(User $user, Media $media)
    {
        if (!$this->mediaUserExists($user, $media)) {
            return true;
        } else {
            return true;
        };
    }

    public function destroy(User $user, Media $media)
    {
        if ($this->mediaUserExists($user, $media)) {
            return auth()->user()->id == $user->id;
        } else {
            return Response::deny();
        };
    }

    private function mediaUserExists(User $user, Media $media)
    {
        if ($user->media->pluck('id')->contains($media->id)) {
            return true;
        } else {
            return false;
        };
    }
}
