<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner', 'id');
    }

    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }

    public function progress()
    {
        $totalMedia = 0;
        $watchedMedia = 0;
        foreach ($this->watchlists as $watchlist) {
            $totalMedia += $watchlist->mediaCount();
            $watchedMedia += $watchlist->watched()->count();
        }
        if ($watchedMedia and $totalMedia) {
            return round($watchedMedia / $totalMedia * 100);
        } else {
            return 0;
        }
    }

    public function comments()
    {
        return $this->hasMany(ClubComment::class);
    }
}
