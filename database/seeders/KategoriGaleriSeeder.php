<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriGaleri;

class KategoriGaleriSeeder extends Seeder
{
    public function run()
    {
        KategoriGaleri::updateOrCreate(['nama' => 'Foto'], ['slug' => 'foto']);
        KategoriGaleri::updateOrCreate(['nama' => 'Video'], ['slug' => 'video']);
    }
}
