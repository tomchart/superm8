<?php

namespace App\Jobs;

use App\Models\Club;
use App\Models\Media;
use App\Models\Watchlist;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateWatchedWatchlist implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $media;
    protected $club;
    protected $watchlist;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Media $media, Club $club, Watchlist $watchlist)
    {
        $this->media = $media;
        $this->club = $club;
        $this->watchlist = $watchlist;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // check all if $media watched for all users in $club
        // if so, update watched column in media_watchlist for $media
        $users = $this->club->users;
        $watched = true;
        foreach ($users as $user) {
            if (!$user->media->contains($this->media)) {
                $watched = false;
            }
        }
        if ($watched) {
            $this->watchlist->media()->updateExistingPivot($this->media->id, ['watched' => 1]);
        }
    }
}
