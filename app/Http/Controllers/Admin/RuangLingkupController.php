<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lingkup;

use Illuminate\Support\Facades\Storage;

class RuangLingkupController extends Controller
{
    public function index()
    {
        $lingkups = Lingkup::all();
        return view('admin.ruang-lingkup.index', compact('lingkups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $path = $request->file('icon')->store('ruang-lingkup', 'public');
    
        \App\Models\Lingkup::create([
            'icon' => $path, // ← simpan path file ke kolom icon
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        return redirect()->back()->with('success', 'Ruang lingkup berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        $item = Lingkup::findOrFail($id);
        return view('admin.ruang-lingkup.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
    
        $item = Lingkup::findOrFail($id);
    
        // Jika ada file baru diunggah
        if ($request->hasFile('icon')) {
            // Simpan file baru
            $path = $request->file('icon')->store('ruang-lingkup', 'public');
    
           
    
            $item->icon = $path;
        }
    
        // Update data lainnya
        $item->title = $request->title;
        $item->description = $request->description;
        $item->save();
    
        return redirect()->route('admin.ruang-lingkup.index')->with('success', 'Ruang lingkup diperbarui.');
    }
    

    public function destroy($id)
    {
        Lingkup::findOrFail($id)->delete();
        return back()->with('success', 'Ruang lingkup dihapus.');
    }
}
