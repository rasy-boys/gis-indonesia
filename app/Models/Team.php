<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'nama',
        'jabatan',
        'deskripsi_singkat',
        'personal_info',
        'email',
        'no_telp',
        'keahlian',
        'pengalaman',
        'alamat',
        'personal_experience',
        'instagram',
        'facebook',
        'linkedin',
        'twitter',
        'youtube',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($team) {
            $team->slug = Str::slug($team->nama);
        });

        static::updating(function ($team) {
            $team->slug = Str::slug($team->nama);
        });
    }
}
