<?php

namespace App\Http\Controllers;
use App\Models\Home;
use App\Models\Lingkup;
use App\Models\Berita; // Tambahkan ini
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $home = Home::first();
        $beritas = Berita::latest()->get();
        $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
        $lingkups = Lingkup::all(); // Ambil semua data ruang lingkup
    
        // Ambil keyword pencarian
        $search = $request->input('search');
    
        // Query team dengan search hanya berdasarkan nama + pagination
        $team = Team::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString(); // biar pagination tetap bawa parameter search
    
        return view('team', compact('home', 'lingkups', 'beritas', 'recentPosts', 'team', 'search'));
    }
    
    public function showBySlug($slug)
    {
        $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
        $team = Team::where('slug', $slug)->firstOrFail();
        return view('team.detail', compact('team', 'recentPosts'));
    }
    

}
