<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'movie_id',
        'customer_name',
        'seat_number',
        'is_checked_in',
        'check_in_time',
    ];
    
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
