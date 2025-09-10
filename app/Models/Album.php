<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // Mass assignable
    protected $fillable = [
        'nama',
        'tahun',
    ];

    // Relasi: 1 album punya banyak galeri
    public function galeris()
    {
        return $this->hasMany(GaleriFoto::class);
    }

    // Optional: bisa buat accessor untuk menampilkan nama + tahun
    public function getLabelAttribute()
    {
        return $this->nama . ' (' . $this->tahun . ')';
    }

    // App\Models\Album.php
public function galeriFotos()
{
    return $this->hasMany(GaleriFoto::class, 'album_id');
}

}
