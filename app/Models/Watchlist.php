<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

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
            ->orderByRaw('watched ASC, name ASC');
    }
}
