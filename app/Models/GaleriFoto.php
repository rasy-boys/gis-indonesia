<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    use HasFactory;

    protected $table = 'galeri_fotos'; // atau 'galeri' jika nama tabelnya tanpa "s"

    protected $fillable = [
        'kategori_id',
        'foto',
        'video_link',
        'tanggal',
        'deskripsi',
        'album_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriGaleri::class, 'kategori_id');
    }

    public function album()
{
    return $this->belongsTo(Album::class);
}
}
