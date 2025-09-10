<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AktivitasController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('tanggal', 'desc')->paginate(6);
    $recentPosts = Berita::orderBy('created_at', 'desc')->take(5)->get();

    $archiveYears = Berita::select(DB::raw('YEAR(tanggal) as year'))
    ->distinct()
    ->orderBy('year', 'desc')
    ->pluck('year');

        return view('aktivitas.index', compact('beritas', 'recentPosts', 'archiveYears'));
    }

    public function arsip($year)
    {
        $beritas = Berita::whereYear('tanggal', $year)
            ->latest('tanggal')
            ->paginate(6);
    
        $recentPosts = Berita::latest()->take(5)->get();
    
        // Ambil tahun arsip unik
        $archiveYears = Berita::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');
    
        return view('info.berita', compact('beritas', 'recentPosts', 'archiveYears'));
    }
    

    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
    
        return view('info.detail-berita', compact('berita'));
    }
}
