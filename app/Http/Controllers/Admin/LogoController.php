<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::latest()->get();
        return view('admin.logo.index', compact('logos'));
    }

    public function create()
    {
        return view('admin.logo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'link' => 'nullable|url', // tidak wajib diisi
        ]);

        $path = $request->file('logo')->store('logo', 'public');

        Logo::create([
            'logo' => $path,
            'link' => $request->link
        ]);

        return redirect()->route('admin.logo.index')->with('success', 'Logo berhasil ditambahkan.');
    }

    public function edit(Logo $logo)
    {
        return view('admin.logo.edit', compact('logo'));
    }

    public function update(Request $request, Logo $logo)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'link' => 'nullable|url', // tidak wajib diisi
        ]);

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($logo->logo);
            $path = $request->file('logo')->store('logo', 'public');
            $logo->logo = $path;
        }

        $logo->link = $request->link;
        $logo->save();

        return redirect()->route('admin.logo.index')->with('success', 'Logo berhasil diperbarui.');
    }

    public function destroy(Logo $logo)
    {
        Storage::disk('public')->delete($logo->logo);
        $logo->delete();

        return redirect()->route('admin.logo.index')->with('success', 'Logo berhasil dihapus.');
    }
}
