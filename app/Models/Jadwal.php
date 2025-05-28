<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $fillable = [
        'trip_id',
        'tanggal_keberangkatan',
        'tanggal_pulang',
        'waktu_keberangkatan',
        'titik_kumpul',
        'slot_tersedia',
        'slot_booking'
    ];

    //relations
    public function trips()
    {
        return $this->belongsTo(Trip::class, 'package_id');
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'schedule_id');
    }
}
