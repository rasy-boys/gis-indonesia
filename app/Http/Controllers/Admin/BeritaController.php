<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\BeritaImage;
use App\Models\Tag;
use App\Models\KategoriBerita;


class BeritaController extends Controller
{
    public function index(Request $request)
{
    $query = Berita::query();

    // Filter berdasarkan tahun jika ada
    if ($request->filled('tahun')) {
        $query->whereYear('tanggal', $request->tahun);
    }

    // Filter berdasarkan kategori jika ada
    if ($request->filled('kategori')) {
        $query->where('kategori_id', $request->kategori);
    }

    // Ambil data berita (dengan pagination)
    $beritas = $query->orderBy('created_at', 'desc')
                    ->paginate(6)
                    ->appends($request->all()); // supaya pagination tetap simpan filter

    // Ambil daftar tahun dari data berita
    $years = Berita::selectRaw('YEAR(tanggal) as year')
                ->distinct()
                ->orderByDesc('year')
                ->pluck('year');

    $kategoris = KategoriBerita::orderBy('nama')->get();

    $popularTags = Tag::withCount('beritas') // hitung jumlah berita per tag
        ->orderByDesc('beritas_count')      // urut dari terbanyak
        ->take(8)                           // ambil 8 tag teratas
        ->get();

    return view('admin.berita.index', compact('beritas', 'years', 'kategoris', 'popularTags'));
}

    public function create()
    {
        $kategoris = KategoriBerita::orderBy('nama')->get();
        $tags = Tag::orderBy('nama')->get();
        return view('admin.berita.create', compact('kategoris', 'tags'));
    }
    

 

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'konten' => 'required',
            'gambar' => 'nullable|image',
            'gambar_lain.*' => 'nullable|image',
            'penulis' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_beritas,id',
        ]);
    
        $data = $request->only('judul', 'tanggal', 'konten', 'penulis', 'kategori_id');
    
        // Buat slug unik
        $slug = Str::slug($request->judul);
        $count = Berita::where('slug', $slug)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        $data['slug'] = $slug;
    
        // Simpan gambar utama
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }
    
        // Simpan berita
        $berita = Berita::create($data);
    
        // Simpan relasi tag
        if ($request->filled('tags')) {
            $berita->tags()->attach($request->tags);
        }
    
        // Simpan gambar tambahan
        if ($request->hasFile('gambar_lain')) {
            foreach ($request->file('gambar_lain') as $img) {
                $path = $img->store('berita_lain', 'public');
                $berita->images()->create(['gambar' => $path]);
            }
        }
    
        return redirect()->route('admin.berita.index')->with('success', 'Berita ditambahkan.');
    }
    
    

public function edit($id)
{
    $kategoris = KategoriBerita::orderBy('nama')->get();
    $tags = Tag::orderBy('nama')->get();
    $berita = Berita::with('tags', 'images')->findOrFail($id);
    return view('admin.berita.edit', compact('berita', 'kategoris', 'tags'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required',
        'tanggal' => 'required|date',
        'konten' => 'required',
        'gambar' => 'nullable|image',
        'gambar_lain.*' => 'nullable|image',
        'penulis' => 'required|string|max:255',
        'kategori_id' => 'required|exists:kategori_beritas,id',
    ]);

    $berita = Berita::findOrFail($id);

    $data = $request->only('judul', 'tanggal', 'konten', 'penulis', 'kategori_id');
    $data['slug'] = Str::slug($request->judul);

    // Update gambar utama
    if ($request->hasFile('gambar')) {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('berita', 'public');
    }

    $berita->update($data);

    // Update relasi tags
    if ($request->filled('tags')) {
        $berita->tags()->sync($request->tags);
    } else {
        $berita->tags()->detach();
    }

    // 🔥 Hapus gambar lama jika ada yang dipilih
    if ($request->has('hapus_gambar')) {
        foreach ($request->hapus_gambar as $id) {
            $gambar = $berita->images()->find($id);
            if ($gambar) {
                Storage::disk('public')->delete($gambar->gambar);
                $gambar->delete();
            }
        }
    }

    // Simpan gambar tambahan baru
    if ($request->hasFile('gambar_lain')) {
        foreach ($request->file('gambar_lain') as $img) {
            $path = $img->store('berita_lain', 'public');
            $berita->images()->create(['gambar' => $path]);
        }
    }

    return redirect()->route('admin.berita.index')->with('success', 'Berita diperbarui.');
}


public function destroy($id)
{
    $berita = Berita::findOrFail($id);

    // Hapus gambar utama
    if ($berita->gambar) {
        Storage::disk('public')->delete($berita->gambar);
    }

    // Hapus gambar tambahan jika ada
    if ($berita->images) {
        foreach ($berita->images as $img) {
            Storage::disk('public')->delete($img->gambar);
            $img->delete();
        }
    }

    $berita->delete();

    return back()->with('success', 'Berita dihapus.');
}

}
