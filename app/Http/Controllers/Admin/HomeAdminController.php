<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Lingkup;
use Illuminate\Support\Facades\Storage;

class HomeAdminController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('admin.home.index', compact('homes'));
    }

    public function create()
    {
        return view('admin.home.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $home = new Home();
        $home->title = $request->title;
        $home->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('home', 'public');
            $home->image = $path;
        }

        $home->save();

        return redirect()->route('admin.home.index')->with('success', 'Beranda berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $home = Home::findOrFail($id);
        $lingkups = Lingkup::all();
        return view('admin.home.edit', compact('home', 'lingkups'));
    }

    public function update(Request $request, $id)
    {
        $home = Home::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $home->title = $request->title;
        $home->description = $request->description;

        if ($request->hasFile('image')) {
            if ($home->image) {
                Storage::delete('public/' . $home->image);
            }
            $path = $request->file('image')->store('home', 'public');
            $home->image = $path;
        }

        $home->save();

        return redirect()->route('admin.home.index')->with('success', 'Beranda berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $home = Home::findOrFail($id);

        if ($home->image) {
            Storage::delete('public/' . $home->image);
        }

        $home->delete();

        return redirect()->route('admin.home.index')->with('success', 'Beranda berhasil dihapus.');
    }
}
