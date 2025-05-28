<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    //
    protected $fillable = [
        'pengguna_id',
        'jadwal_id',
        'kode_pesanan',
        'jumlah_peserta',
        'jumlah_total',
        'status_pesanan',
        'tanggal_pesanan',
        'batas_pembayaran'
    ];

    //relations
    public function penggunas()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function jadwals()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function payments()
    {
        return $this->hasMany(payment::class);
    }

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }
}
