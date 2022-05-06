<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'rating_ebert';

    public function media()
    {
        return $this->hasMany(Media::class, 'rating_ebert');
    }
}
