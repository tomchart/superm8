<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['media_type_id', 'name'];

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
}
