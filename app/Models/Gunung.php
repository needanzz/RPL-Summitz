<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gunung extends Model
{
    // mass assignment
    protected $fillable = [
        'nama_gunung',
        'provinsi_id',
        'deskripsi',
        'image',
        'image_gallery'
    ];

    //relations
    public function provinsis()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    //slug
    protected static function boot(){
        parent::boot();

        static::saving(function($gunung)
        {
            if(empty($gunung->slug)){
                $gunung->slug = Str::slug($gunung->name);
            }
        });
    }
}
