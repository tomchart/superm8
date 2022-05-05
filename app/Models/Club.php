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

    public function invites()
    {
        return $this->hasMany(Invite::class);
    }
}
