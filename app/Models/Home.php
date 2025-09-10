<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    // Jika kamu tidak ingin mass assignment error saat insert/update
    protected $fillable = [
        'title',
        'description',
        'image',
    ];
}

