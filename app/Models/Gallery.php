<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = [
        'trip_id',
        'image_path',
    ];

    protected $casts = [
        'image_path' => 'array',
    ];


    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
