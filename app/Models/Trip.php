<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = ['title'
        // 'mountain_id',
        // 'title',
        // 'duration_day',
        // 'price',
        // 'main_image',
        // 'description',
    ];

    public function mountain()
    {
        return $this->belongsTo(Mountain::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function itineraries()
    {
        return $this->hasMany(itinerary::class);
    }

    public function facilities()
    {
        return $this->hasMany(facility::class);
    }

    public function galleries()
    {
        return $this->hasMany(gallery::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
