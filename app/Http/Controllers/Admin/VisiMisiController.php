<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function edit()
    {
        $data = VisiMisi::first();
        return view('admin.visi-misi.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $data = VisiMisi::firstOrNew([]);
        $data->visi = $request->visi;
        $data->misi = $request->misi;
        $data->save();

        return redirect()->back()->with('success', 'Visi & Misi diperbarui.');
    }
}

