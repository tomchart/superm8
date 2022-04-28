<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['media_type', 'name', 'type_id'];

    public function type()
    {
        return $this->belongsTo(MediaType::class);
    }

    public function watchlists()
    {
        return $this->belongsToMany(Watchlist::class);
    }
}
