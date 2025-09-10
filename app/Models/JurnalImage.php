<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalImage extends Model
{
    protected $fillable = ['jurnal_id', 'gambar'];

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class);
    }
}
