<?php

namespace App\Jobs;

use App\Models\Media;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateWatchedProfile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $media;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Media $media)
    {
        $this->user = $user;
        $this->media = $media;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    // also need to add a job to run when users join clubs - update whether films are watched
    public function handle()
    {
        // if everyone other than the user has watched the film, mark as watched in lists
        // because the last user has now watched the film
        $clubs = $this->user->clubs;
        foreach ($clubs as $club) {
            $watched = true;
            foreach ($club->users as $club_user) {
                if (!$club_user->media->contains($this->media) and $club_user = $this->user) {
                    $watched = false;
                }
            }
            if ($watched) {
                foreach ($club->watchlists as $watchlist) {
                    $watchlist->media()->updateExistingPivot($this->media->id, ['watched' => 1]);
                }
            }
        }
    }
}
