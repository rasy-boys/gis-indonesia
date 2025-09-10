<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pamflet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PamfletController extends Controller
{
    public function index()
    {
        $pamflets = Pamflet::latest()->get();

        return view('admin.pamflets.index', compact('pamflets'));
    }

    public function create()
    {
        return view('admin.pamflets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pamflets', 'public');
        } else {
            $data['gambar'] = 'defaults/pamflet.png'; // default jika kosong
        }

        Pamflet::create($data);

        return redirect()->route('admin.pamflets.index')->with('success', 'Pamflet berhasil ditambahkan');
    }

    public function show(Pamflet $pamflet)
    {
        return view('admin.pamflets.show', compact('pamflet'));
    }

    public function edit(Pamflet $pamflet)
    {
        return view('admin.pamflets.edit', compact('pamflet'));
    }

    public function update(Request $request, Pamflet $pamflet)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai']);

        if ($request->hasFile('gambar')) {
            if ($pamflet->gambar && Storage::disk('public')->exists($pamflet->gambar) && $pamflet->gambar !== 'defaults/pamflet.png') {
                Storage::disk('public')->delete($pamflet->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('pamflets', 'public');
        }

        $pamflet->update($data);

        return redirect()->route('admin.pamflets.index')->with('success', 'Pamflet berhasil diperbarui');
    }

    public function destroy(Pamflet $pamflet)
    {
        if ($pamflet->gambar && Storage::disk('public')->exists($pamflet->gambar) && $pamflet->gambar !== 'defaults/pamflet.png') {
            Storage::disk('public')->delete($pamflet->gambar);
        }
        $pamflet->delete();

        return redirect()->route('admin.pamflets.index')->with('success', 'Pamflet berhasil dihapus');
    }
}
