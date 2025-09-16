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

    public function create()
    {
        return view('admin.ruang-lingkup.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $path = $request->file('icon')->store('ruang-lingkup', 'public');

        Lingkup::create([
            'icon' => $path,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.ruang-lingkup.index')->with('success', 'Ruang lingkup berhasil ditambahkan.');
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

        if ($request->hasFile('icon')) {
            // simpan file baru
            $path = $request->file('icon')->store('ruang-lingkup', 'public');

            // hapus file lama kalau ada
            if ($item->icon && Storage::disk('public')->exists($item->icon)) {
                Storage::disk('public')->delete($item->icon);
            }

            $item->icon = $path;
        }

        $item->title = $request->title;
        $item->description = $request->description;
        $item->save();

        return redirect()->route('admin.ruang-lingkup.index')->with('success', 'Ruang lingkup diperbarui.');
    }

    public function destroy($id)
    {
        $item = Lingkup::findOrFail($id);

        if ($item->icon && Storage::disk('public')->exists($item->icon)) {
            Storage::disk('public')->delete($item->icon);
        }

        $item->delete();

        return back()->with('success', 'Ruang lingkup dihapus.');
    }
}
