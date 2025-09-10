<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriGaleri extends Model
{
    protected $table = 'kategori_galeri';
    protected $fillable = ['nama', 'slug'];

    public function galeriFotos()
    {
        return $this->hasMany(GaleriFoto::class, 'kategori_id');
    }
}
