<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    //
    protected $fillable = [
        'pengguna_id',
        'trip_id',
        'pemesanan_id',
        'rating',
        'review',
    ];

    //relations
    public function penggunas()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function trips()
    {
        return $this->belongsTo(Trip::class, 'package_id');
    }

    public function pemesanans()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
