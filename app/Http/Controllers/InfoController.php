<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Tambahkan ini
use Illuminate\Support\Facades\DB;
use App\Models\KategoriBerita;
use App\Models\Logo;
use App\Models\Pamflet;
use App\Models\Tag;
use App\Models\Faq;

use Carbon\Carbon;
class InfoController extends Controller
{
    public function berita(Request $request)
    {
        $search = $request->input('search');
        $tahun = $request->input('tahun');
        $kategori = $request->input('kategori');
    
        $query = Berita::query();
    
        if ($search) {
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('konten', 'like', "%{$search}%");
        }
    
        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }
    
        if ($kategori) {
            $query->where('kategori_id', $kategori);
        }
    
        $beritas = $query->orderBy('created_at', 'desc')->paginate(6)->withQueryString();
    
        $recentPosts = Berita::orderBy('created_at', 'desc')->take(5)->get();
        $recentPostss = Berita::orderBy('created_at', 'desc')->take(2)->get();
        $archiveYears = Berita::select(DB::raw('YEAR(tanggal) as year'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        $categories = KategoriBerita::all();
    
        return view('info.berita', compact('beritas','recentPosts', 'archiveYears', 'categories', 'recentPostss'));
    }

    public function filterByTag(Tag $tag)
{
    // Ambil berita yang memiliki tag ini
    $beritas = $tag->beritas()->latest()->paginate(5);
    $archiveYears = Berita::select(DB::raw('YEAR(tanggal) as year'))
    ->distinct()
    ->orderBy('year', 'desc')
    ->pluck('year');
$categories = KategoriBerita::all();
$recentPostss = Berita::orderBy('created_at', 'desc')->take(2)->get();
    return view('info.berita', compact('beritas', 'tag',  'archiveYears', 'categories', 'recentPostss'));
}

    

public function arsip($year)
{
    $beritas = Berita::whereYear('tanggal', $year)
        ->latest('tanggal')
        ->paginate(6);

    $recentPosts = Berita::latest()->take(5)->get();
    $archiveYears = Berita::selectRaw('YEAR(tanggal) as year')
        ->distinct()
        ->orderByDesc('year')
        ->pluck('year');
    $categories = KategoriBerita::all(); // tambahkan ini

    return view('info.berita', compact('beritas', 'recentPosts', 'archiveYears', 'categories'));
}



public function kategori($nama)
{
    $kategori = KategoriBerita::where('nama', $nama)->firstOrFail();
    $beritas = $kategori->beritas()->latest()->paginate(6);
    $recentPosts = Berita::latest()->take(5)->get();

    $archiveYears = Berita::selectRaw('YEAR(tanggal) as year')
        ->distinct()
        ->orderByDesc('year')
        ->pluck('year');

    $categories = KategoriBerita::all();

    return view('info.berita', compact(
        'beritas',
        'recentPosts',
        'archiveYears',
        'categories',
        'kategori'
    ));
}



    public function detail($slug)
    {
        $categories = KategoriBerita::withCount('beritas')
        ->orderByDesc('beritas_count')
        ->take(5)
        ->get();
    
    
        $archiveYears = Berita::select(DB::raw('YEAR(tanggal) as year'))
        ->distinct()
        ->orderBy('year', 'desc')
        ->pluck('year');

        $berita = Berita::where('slug', $slug)->firstOrFail();
        $recentPosts = Berita::orderBy('created_at', 'desc')->take(5)->get();
        $recentPostss = Berita::orderBy('created_at', 'desc')->take(2)->get();
        
        $popularTags = Tag::withCount('beritas') // hitung jumlah berita per tag
        ->orderByDesc('beritas_count')      // urut dari terbanyak
        ->take(8)                           // ambil 8 tag teratas
        ->get();
        return view('info.detail-berita', compact('berita', 'recentPosts', 'archiveYears', 'categories', 'recentPostss', 'popularTags'));
    }
            public function faq()
            {
                $faqs = Faq::latest()->paginate(10);
                $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
                return view('info.faq', compact('recentPosts', 'faqs'));
            }


            public function pelatihan_dan_perdampingan()
            {
                $today = Carbon::today();
            
                // Pamflet yang coming soon / masih aktif, paginate 6
                $comingSoon = Pamflet::where('tanggal_selesai', '>=', $today)
                                ->orderBy('tanggal_mulai', 'asc')
                                ->paginate(8);
            
                // Pamflet yang sudah lewat
                $expired = Pamflet::where('tanggal_selesai', '<', $today)
                                ->orderBy('tanggal_selesai', 'desc')
                                ->paginate(8);
            
                $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
            
                return view('info.pelatihan_dan_perdampingan', compact('recentPosts', 'comingSoon', 'expired'));
            }
            
            public function showPamflet($id)
{
    $pamflet = Pamflet::findOrFail($id); // Ambil data pamflet sesuai ID
    $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get(); // Berita terbaru
    return view('info.detail-pamflet', compact('pamflet', 'recentPosts'));
}


            public function seminar()
            {
                return view('info.seminar');
            }

            public function kerjasama()
            {
                $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
                $logos = Logo::latest()->get();
                return view('info.kerjasama', compact('logos', 'recentPosts'));
            }


            public function pelatihan_dan_advokasi()
            {
                return view('info.pelatihan_dan_advokasi');
            }
}
