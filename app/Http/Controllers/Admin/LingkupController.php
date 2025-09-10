<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lingkup;
class LingkupController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'icon' => 'required|string',
        'title' => 'required|string',
        'description' => 'required|string',
    ]);

    Lingkup::create($request->only('icon', 'title', 'description'));

    return back()->with('success', 'Ruang lingkup ditambahkan.');
}

public function destroy($id)
{
    Lingkup::findOrFail($id)->delete();
    return back()->with('success', 'Ruang lingkup dihapus.');
}
}
