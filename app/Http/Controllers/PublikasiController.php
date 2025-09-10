<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peraturan;
use App\Models\Jurnal;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;
class PublikasiController extends Controller
{
    public function peraturan()
{
    $peraturans = Peraturan::latest()->get();
   
    return view('publikasi.peraturan', compact('peraturans'));
}

public function jurnal()
{
    $jurnals = Jurnal::latest()->paginate(6);
    $recentPosts = Jurnal::orderBy('created_at', 'desc')->take(5)->get();
    $archiveYears = Jurnal::select(DB::raw('YEAR(tanggal) as year'))
    ->distinct()
    ->orderBy('year', 'desc')
    ->pluck('year');

    return view('publikasi.jurnal', compact('jurnals', 'recentPosts', 'archiveYears'));
}

public function arsip($year)
{
    $jurnal = jurnal::whereYear('tanggal', $year)
        ->latest('tanggal')
        ->paginate(6);

    $recentPosts = Jurnal::latest()->take(5)->get();

    // Ambil tahun arsip unik
    $archiveYears = Jurnal::selectRaw('YEAR(tanggal) as year')
        ->distinct()
        ->orderByDesc('year')
        ->pluck('year');

    return view('publikasi.jurnal', compact('jurnal', 'recentPosts', 'archiveYears'));
}

public function detail($slug)
{
    $archiveYears = Jurnal::select(DB::raw('YEAR(tanggal) as year'))
    ->distinct()
    ->orderBy('year', 'desc')
    ->pluck('year');

    $jurnal = Jurnal::where('slug', $slug)->firstOrFail();
    $recentPosts = Jurnal::orderBy('created_at', 'desc')->take(5)->get();
    return view('publikasi.detail-jurnal', compact('jurnal', 'recentPosts', 'archiveYears'));
}

public function hasilpenelitian()
{
    return view('publikasi.hasilpenelitian');
}



}
