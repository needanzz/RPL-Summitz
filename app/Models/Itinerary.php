<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    //
    protected $fillable = [
        'day',
        'activity',
    ];

    public function trips()
    {
        return $this->belongsToMany(Trip::class); 
    }
}
