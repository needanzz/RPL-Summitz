<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable = [
        'username',
        'email',
        'password',
        'full_name',
        'is_active'
    ];
}
