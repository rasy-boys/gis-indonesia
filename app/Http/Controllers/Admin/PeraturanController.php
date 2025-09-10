<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peraturan;
use Illuminate\Support\Facades\Storage;

class PeraturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peraturans = Peraturan::latest()->get();
        return view('admin.peraturan.index', compact('peraturans'));
    }
    
    public function create()
    {
        return view('admin.peraturan.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ]);
    
        $path = $request->file('file')->store('peraturan', 'public');
    
        Peraturan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $path,
        ]);
    
        return redirect()->route('admin.peraturan.index')->with('success', 'Peraturan ditambahkan.');
    }
    
    public function edit($id)
    {
        $peraturan = Peraturan::findOrFail($id);
        return view('admin.peraturan.edit', compact('peraturan'));
    }
    
    public function update(Request $request, $id)
    {
        $peraturan = Peraturan::findOrFail($id);
    
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048'
        ]);
    
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($peraturan->file);
            $data['file'] = $request->file('file')->store('peraturan', 'public');
        }
    
        $peraturan->update($data);
    
        return redirect()->route('admin.peraturan.index')->with('success', 'Peraturan diperbarui.');
    }
    
    public function destroy($id)
    {
        $peraturan = Peraturan::findOrFail($id);
        Storage::disk('public')->delete($peraturan->file);
        $peraturan->delete();
    
        return back()->with('success', 'Peraturan dihapus.');
    }
}
