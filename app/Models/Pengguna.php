<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    //
    protected $fillable = [
        'username',
        'email',
        'password',
        'full_name',
        'phone_number',
        'tanggal_lahir',
        'gender',
        'address',
        'is_active',
    ];

    //relations
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function reviews()
    {
        return $this->hasMany(Ulasan::class);
    }
}
