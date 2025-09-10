<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GaleriFoto;
use Illuminate\Support\Facades\Storage;
use App\Models\KategoriGaleri;
use App\Models\Album;

class GaleriFotoController extends Controller
{
    const KATEGORI_FOTO = 1;
    const KATEGORI_VIDEO = 2;

    public function index()
    {

        $albums = Album::with(['galeris' => function($query) {
            $query->orderBy('tanggal', 'desc'); // urutkan galeri per tanggal terbaru
        }])->orderBy('tahun', 'desc')->get();
    
        $galeris = GaleriFoto::latest()->get();
        return view('admin.galeri.index', compact('galeris', 'albums'));
    }

  // Controller
  public function showAlbum(Album $album)
  {
      $galeris = $album->galeris()
                       ->latest() // berdasarkan created_at, data terbaru di atas
                       ->paginate(8); 
  
      return view('admin.galeri.show', compact('album', 'galeris'));
  }
  
    
public function create(Request $request)
{
    $albums = \App\Models\Album::orderBy('tahun', 'desc')->get();
    $kategoris = KategoriGaleri::all();

    // Ambil album_id dari query string
    $album_id = $request->input('album_id');
    $album_tahun = null;

    if ($album_id) {
        $album = \App\Models\Album::find($album_id);
        if ($album) {
            $album_tahun = $album->tahun;
        }
    }

    return view('admin.galeri.create', compact('kategoris', 'albums', 'album_id', 'album_tahun'));
}



public function store(Request $request)
{
    $request->validate([
        'kategori_id' => 'required|exists:kategori_galeri,id',
        'foto' => 'nullable|image|required_if:kategori_id,' . self::KATEGORI_FOTO,
        'video_link' => 'nullable|url|required_if:kategori_id,' . self::KATEGORI_VIDEO,
        'tanggal' => 'required|date',
        'deskripsi' => 'nullable|string',
        'album_id' => 'nullable|exists:albums,id', // validasi album
    ]);

    // Ambil data dari request
    $data = $request->only('kategori_id', 'tanggal', 'deskripsi', 'album_id');

    // Jika album_id tidak diisi, set ke album default
    if (empty($data['album_id'])) {
        $defaultAlbum = \App\Models\Album::firstOrCreate(
            ['nama' => 'Tanpa Album'],
            ['tahun' => now()->year] // bisa diisi default tahun
        );

        $data['album_id'] = $defaultAlbum->id;

        // Update semua galeri yang belum punya album ke default album
        $defaultAlbum->galeriFotos()->whereNull('album_id')->update(['album_id' => $defaultAlbum->id]);

        // Kalau ada relasi video juga
        if (method_exists($defaultAlbum, 'galeriVideos')) {
            $defaultAlbum->galeriVideos()->whereNull('album_id')->update(['album_id' => $defaultAlbum->id]);
        }
    }

    // Simpan foto atau video
    if ($request->kategori_id == self::KATEGORI_FOTO) {
        $data['foto'] = $request->file('foto')->store('galeri', 'public');
        $data['video_link'] = null;
    } else {
        $data['video_link'] = $request->video_link;
        $data['foto'] = null;
    }

    // Simpan ke database
    GaleriFoto::create($data);

    // Redirect langsung ke halaman detail album
    return redirect()
        ->route('admin.galeri.album.show', $data['album_id'])
        ->with('success', 'Data galeri berhasil ditambahkan ke album.');
}

    
    

    public function edit($id)
    {
        $galeri = GaleriFoto::findOrFail($id);
        $kategoris = KategoriGaleri::all();
        $albums = \App\Models\Album::orderBy('tahun','desc')->get();
        return view('admin.galeri.edit', compact('galeri', 'kategoris', 'albums'));
    }

    public function update(Request $request, GaleriFoto $galeri)
{
    $request->validate([
        'kategori_id' => 'required|exists:kategori_galeri,id',
        'foto' => [
            'nullable',
            'image',
            function ($attribute, $value, $fail) use ($request, $galeri) {
                // Foto wajib jika kategori foto dan tidak ada foto lama
                if ($request->kategori_id == GaleriFotoController::KATEGORI_FOTO && !$value && !$galeri->foto) {
                    $fail('Foto wajib diisi karena belum ada foto lama.');
                }
            }
        ],
        'video_link' => 'nullable|url|required_if:kategori_id,' . self::KATEGORI_VIDEO,
        'tanggal' => 'required|date',
        'deskripsi' => 'nullable|string',
        'album_id' => 'nullable|exists:albums,id',
    ]);
    

    // Update data dasar
    $galeri->kategori_id = $request->kategori_id;
    $galeri->tanggal = $request->tanggal;
    $galeri->deskripsi = $request->deskripsi;
    $galeri->album_id = $request->album_id; // update album

    
    // Update foto/video
    if ($request->kategori_id == self::KATEGORI_FOTO) {
        if ($request->hasFile('foto')) {
            if ($galeri->foto) {
                Storage::disk('public')->delete($galeri->foto);
            }
            $galeri->foto = $request->file('foto')->store('galeri', 'public');
        }
        $galeri->video_link = null;
    } else {
        $galeri->video_link = $request->video_link;
        if ($galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
            $galeri->foto = null;
        }
    }

    $galeri->save();

    return redirect()
    ->route('admin.galeri.album.show', $galeri['album_id'])
    ->with('success', 'Data galeri berhasil ditambahkan ke album.');
}


    public function destroy(GaleriFoto $galeri)
    {
        if ($galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
        }
        $galeri->delete();

        return back()->with('success', 'Data galeri berhasil dihapus.');
    }
}
