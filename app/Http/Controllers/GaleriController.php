<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GaleriFoto;
use App\Models\Berita;
use App\Models\Album;
class GaleriController extends Controller
{
    public function foto(Request $request)
    {
        $query = $request->input('q');
    
        $albums = Album::with(['galeris' => function($q) {
            $q->orderBy('tanggal', 'desc');
        }])
        ->when($query, function($q) use ($query) {
            $q->where('nama', 'like', "%{$query}%")
              ->orWhere('tahun', 'like', "%{$query}%");
        })
        ->orderBy('tahun', 'desc')
        ->get();
    
        $galeris = GaleriFoto::latest()->get();
        $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
    
        return view('galeri.foto', compact('galeris', 'recentPosts', 'albums'));
    }
    
    
    
    public function showAlbum($id)
{
    $galeris = GaleriFoto::latest()->get();
    $album = \App\Models\Album::with('galeriFotos')->findOrFail($id);
    $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();

    return view('galeri.album-show', compact('album', 'galeris', 'recentPosts'));
}


}
