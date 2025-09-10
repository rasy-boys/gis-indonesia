<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Lingkup;
use App\Models\Berita; // Tambahkan ini
use App\Models\Logo;
use App\Models\Testimoni;

use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimoni::all();
        $logos = Logo::latest()->get();
        $home = Home::all();
        $beritas = Berita::latest()->get();
        $team = Team::latest()->get();
        $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
        $lingkups = Lingkup::all(); // Ambil semua data ruang lingkup


        return view('home', compact('home', 'lingkups', 'beritas', 'recentPosts', 'team', 'logos', 'testimonials'));
    }

    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
    
        return view('info.detail-berita', compact('berita'));
    }
}
