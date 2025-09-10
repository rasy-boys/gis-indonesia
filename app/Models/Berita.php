<?php

namespace App\Models;
use App\Models\BeritaImage;
use App\Models\KategoriBerita;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'tanggal',
       
        'konten',
        'gambar',
        'penulis',
        'kategori_id'
    ];

    public function images()
{
    return $this->hasMany(BeritaImage::class);
}

public function kategori()
{
    return $this->belongsTo(KategoriBerita::class, 'kategori_id');
}

public function tags()
{
    return $this->belongsToMany(Tag::class);
}


}
