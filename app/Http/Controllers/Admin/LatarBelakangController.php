<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LatarBelakang;
use Illuminate\Http\Request;

class LatarBelakangController extends Controller
{
    public function edit()
    {
        $data = LatarBelakang::first();
        return view('admin.latar-belakang.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = LatarBelakang::firstOrNew([]);
        $data->title = $request->title;
        $data->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('latar-belakang', 'public');
            $data->image = $path;
        }

        $data->save();

        return redirect()->back()->with('success', 'Latar belakang berhasil diperbarui.');
    }
}
