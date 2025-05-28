<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    // mass assignment
    protected $fillable = [
        'nama_provinsi',
        'nama_pulau',
    ];

    //relations
    public function gunungs()
    {
        return $this->hasMany(Gunung::class);
    }
}
