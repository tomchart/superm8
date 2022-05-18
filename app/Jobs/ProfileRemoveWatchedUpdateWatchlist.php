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

class ProfileRemoveWatchedUpdateWatchlist implements ShouldQueue
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
    public function handle()
    {
        foreach ($this->user->clubs as $club) {
            foreach ($club->watchlists as $watchlist) {
                if ($watchlist->media->contains($this->media)) {
                    $watchlist->media()->updateExistingPivot($this->media->id, ['watched' => 0]);
                }
            }
        }
    }
}
