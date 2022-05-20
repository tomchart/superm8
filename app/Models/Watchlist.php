<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'club_id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function media()
    {
        return $this->belongsToMany(Media::class)
            ->withPivot('watched')
            ->orderByRaw('watched ASC, Title ASC');
    }

    public function unwatched()
    {
        return $this->belongsToMany(Media::class)
            ->wherePivot('watched', '=', '0');
    }

    public function watched()
    {
        return $this->belongsToMany(Media::class)
            ->wherePivot('watched', '=', '1');
    }

    public function mediaCount()
    {
        return $this->media()->count();
    }
}
