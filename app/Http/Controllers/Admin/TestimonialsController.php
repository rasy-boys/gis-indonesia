<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Storage;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimoni::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi_singkat' => 'required|string',
            'nama'      => 'required|string|max:100',
            'jabatan'   => 'required|string|max:100',
            'rating'    => 'required|integer|min:1|max:5',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['deskripsi_singkat', 'nama', 'jabatan', 'rating']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('testimonials', 'public');
        }

        Testimoni::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $testimonial = Testimoni::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        // Cari testimoni berdasarkan ID, gagal jika tidak ada
        $testimonial = Testimoni::findOrFail($id);
    
        // Validasi input
        $validated = $request->validate([
            'deskripsi_singkat' => 'required|string',
            'nama'              => 'required|string|max:100',
            'jabatan'           => 'required|string|max:100',
            'rating'            => 'required|integer|min:1|max:5',
            'gambar'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Jika ada file gambar baru, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('gambar')) {
            if ($testimonial->gambar && Storage::disk('public')->exists($testimonial->gambar)) {
                Storage::disk('public')->delete($testimonial->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('testimonials', 'public');
        }
    
        // Update data testimoni
        $testimonial->update($validated);
    
        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('admin.testimonials.index')
                         ->with('success', 'Testimoni berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $testimonial = Testimoni::findOrFail($id);
        if ($testimonial->gambar) {
            Storage::disk('public')->delete($testimonial->gambar);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
