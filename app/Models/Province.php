<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $fillable = [
        'province_name',
    ];

    public function mountains()
    {
        return $this->hasMany(Mountain::class);
    }
}
