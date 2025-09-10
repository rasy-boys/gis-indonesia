<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('nama')->get();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:tags,nama',
        ]);

        Tag::create($request->only('nama'));

        return redirect()->route('admin.tags.index')->with('success', 'Tag berhasil ditambahkan');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'nama' => 'required|unique:tags,nama,' . $tag->id,
        ]);

        $tag->update($request->only('nama'));

        return redirect()->route('admin.tags.index')->with('success', 'Tag diperbarui');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success', 'Tag dihapus');
    }
}
