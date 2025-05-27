<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Trip extends Model
{
    //
    protected $fillable = [
        'gunung_id',
        'trip_name',
        'deskripsi',
        'duration_day',
        'harga',
        'max_participants',
        'fasilitas',
        'itinerary',
        'is_active',
    ];

    //relations
    public function gunungs()
    {
        return $this->belongsTo(Gunung::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }

    //slug
    protected static function boot(){
        parent::boot();

        static::saving(function($trip)
        {
            if(empty($trip->slug)){
                $trip->slug = Str::slug($trip->name);
            }
        });
    }
}
