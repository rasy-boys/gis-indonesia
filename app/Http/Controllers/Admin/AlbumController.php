<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\GaleriFoto;
class AlbumController extends Controller
{
    public function index()
    {
        // Ambil album terbaru dulu, 3 per halaman
        $albums = Album::orderBy('tahun', 'desc')->paginate(3);
    
        return view('admin.albums.index', compact('albums'));
    }
    
    public function create()
    {
        return view('admin.albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
        ]);

        Album::create($request->only('nama', 'tahun'));

        return redirect()->route('admin.albums.index')->with('success', 'Album berhasil ditambahkan.');
    }

    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
        ]);

        $album->update($request->only('nama', 'tahun'));

        return redirect()->route('admin.albums.index')->with('success', 'Album berhasil diperbarui.');
    }

    public function destroy(Album $album)
    {
        // Cari atau buat album default (Tanpa Album)
        $defaultAlbum = Album::firstOrCreate(
            ['nama' => 'Tanpa Album'],
            ['deskripsi' => 'Foto dan video tanpa album']
        );
    
        // Pindahkan semua foto dari album ini ke album default
        $album->galeriFotos()->update(['album_id' => $defaultAlbum->id]);
    
        // Kalau ada relasi video juga
        if (method_exists($album, 'galeriVideos')) {
            $album->galeriVideos()->update(['album_id' => $defaultAlbum->id]);
        }
    
        // Hapus album aslinya
        $album->delete();
    
        return back()->with('success', 'Album berhasil dihapus. Semua foto & video dipindahkan ke album Tanpa Album.');
    }
    
}
