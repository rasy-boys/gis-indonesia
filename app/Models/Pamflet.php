<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pamflet extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
}
