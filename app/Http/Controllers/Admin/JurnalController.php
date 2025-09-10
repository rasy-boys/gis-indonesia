<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurnal;
use App\Models\JurnalImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class JurnalController extends Controller
{
    public function index()
    {
        $jurnals = Jurnal::latest()->get();
        return view('admin.jurnal.index', compact('jurnals'));
    }

    public function create()
    {
        return view('admin.jurnal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
            'konten' => 'required',
            'gambar' => 'nullable|image',
            'gambar_lain.*' => 'nullable|image',
        ]);

        $data = $request->only('judul', 'tanggal', 'deskripsi', 'konten');
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('jurnal', 'public');
        }

        $jurnal = Jurnal::create($data);

        if ($request->hasFile('gambar_lain')) {
            foreach ($request->file('gambar_lain') as $img) {
                $path = $img->store('jurnal_lain', 'public');
                $jurnal->images()->create(['gambar' => $path]);
            }
        }

        return redirect()->route('admin.jurnal.index')->with('success', 'Jurnal ditambahkan.');
    }

    public function edit($id)
    {
        $jurnal = Jurnal::with('images')->findOrFail($id);
        return view('admin.jurnal.edit', compact('jurnal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
            'konten' => 'required',
            'gambar' => 'nullable|image',
            'gambar_lain.*' => 'nullable|image',
        ]);

        $jurnal = Jurnal::findOrFail($id);
        $data = $request->only('judul', 'tanggal', 'deskripsi', 'konten');
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            if ($jurnal->gambar) {
                Storage::disk('public')->delete($jurnal->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('jurnal', 'public');
        }

        $jurnal->update($data);

        if ($request->hasFile('gambar_lain')) {
            foreach ($request->file('gambar_lain') as $img) {
                $path = $img->store('jurnal_lain', 'public');
                $jurnal->images()->create(['gambar' => $path]);
            }
        }

        return redirect()->route('admin.jurnal.index')->with('success', 'Jurnal diperbarui.');
    }

    public function destroy($id)
    {
        $jurnal = Jurnal::findOrFail($id);

        if ($jurnal->gambar) {
            Storage::disk('public')->delete($jurnal->gambar);
        }

        foreach ($jurnal->images as $img) {
            Storage::disk('public')->delete($img->gambar);
            $img->delete();
        }

        $jurnal->delete();

        return back()->with('success', 'Jurnal dihapus.');
    }
}
