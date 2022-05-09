<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['type_id', 'name', 'rating_ebert'];

    public function type()
    {
        return $this->belongsTo(MediaType::class);
    }

    public function watchlists()
    {
        return $this->belongsToMany(Watchlist::class);
    }

    public function users_watched()
    {
        return $this->belongsToMany(User::class);
    }

    public function rating()
    {
        return $this->belongsTo(Rating::class, 'rating_ebert');
    }

    public function omdb()
    {
        return $this->hasOne(OmdbInfo::class, 'media_id');
    }
}
