<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $fillable = ['judul', 'slug', 'tanggal', 'deskripsi', 'konten', 'gambar'];

    public function images()
    {
        return $this->hasMany(JurnalImage::class);
    }
}
