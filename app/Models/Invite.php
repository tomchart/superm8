<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'club_id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
