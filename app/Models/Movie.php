<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'movie_title',
        'duration',
        'release_date',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
