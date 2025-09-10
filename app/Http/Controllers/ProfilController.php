<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\latarBelakang;
use App\Models\Logo;
use App\Models\Testimoni;
use App\Models\Berita;
use App\Models\VisiMisi;

class ProfilController extends Controller
{
    public function latarBelakang()
    {
        $logos = Logo::latest()->get();
        $testimonials = Testimoni::all();
        $data = LatarBelakang::first();
        $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
        return view('profil.latar-belakang', compact('data', 'logos', 'testimonials', 'recentPosts'));
    }

    public function visiMisi()
{
    $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
    $data = VisiMisi::first();
    return view('profil.visi-misi', compact('data',  'recentPosts'));
}

public function struktur()
{
    return view('profil.struktur');
}

}
