<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
    protected $fillable = [
        'pemesanan_id',
        'total',
        'metode_pembayaran',
        'status_pembayaran',
        'transaction_id',
        'gateway_responses',
        'tanggal_pembayaran',
    ];

    //relations
    public function pemesanans()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
