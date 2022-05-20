<?php

namespace App\Jobs;

use App\Models\Club;
use App\Models\Media;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddWatchedFromWatchlist implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $status;
    protected $club;
    protected $media;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(String $status, Club $club, Media $media)
    {
        $this->status = $status;
        $this->club = $club;
        $this->media = $media;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->status == '1') {
            foreach ($this->club->users as $user) {
                if (!$user->media->contains($this->media->id)) {
                    $user->media()->attach($this->media);
                }
            }
        }
    }
}
