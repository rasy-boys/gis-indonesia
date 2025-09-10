<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Rules untuk validasi form
     */
    private function rules()
    {
        return [
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'personal_info' => 'required|string',
          'email' => 'required|email|max:255',

            'no_telp' => 'nullable|string|max:20',
            'pengalaman' => 'required|integer|min:0',
          'keahlian' => 'required|string',

            'alamat' => 'nullable|string',
            'personal_experience' => 'nullable|string',
            'instagram' => 'nullable|url',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
        ];
    }

    public function index()
    {
        $teams = Team::latest()->paginate(6);
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'instagram' => $request->instagram ?: null,
            'facebook' => $request->facebook ?: null,
            'linkedin' => $request->linkedin ?: null,
            'twitter' => $request->twitter ?: null,
            'youtube' => $request->youtube ?: null,
        ]);

        $request->validate($this->rules());

        $data = $request->only([
            'nama', 'jabatan', 'deskripsi_singkat', 'personal_info', 'email',
            'no_telp', 'pengalaman', 'keahlian', 'alamat', 'personal_experience',
            'instagram', 'facebook', 'linkedin', 'twitter', 'youtube'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('teams', 'public');
        } else {
            // Biarkan null, gunakan default di view
            $data['gambar'] = null;
        }

        Team::create($data);

        return redirect()->route('admin.teams.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->merge([
            'instagram' => $request->instagram ?: null,
            'facebook'  => $request->facebook ?: null,
            'linkedin'  => $request->linkedin ?: null,
            'twitter'   => $request->twitter ?: null,
            'youtube'   => $request->youtube ?: null,
        ]);

        $request->validate($this->rules());

        $data = $request->only([
            'nama', 'jabatan', 'deskripsi_singkat', 'personal_info', 'email',
            'no_telp', 'pengalaman', 'keahlian', 'alamat', 'personal_experience',
            'instagram', 'facebook', 'linkedin', 'twitter', 'youtube'
        ]);

        if ($request->hasFile('gambar')) {
            // hapus gambar lama kalau ada
            if ($team->gambar && Storage::disk('public')->exists($team->gambar)) {
                Storage::disk('public')->delete($team->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('teams', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.teams.index')->with('success', 'Data berhasil diperbarui');
    }
    

    public function destroy(Team $team)
    {
        // Hanya hapus gambar user, jangan hapus default
        if ($team->gambar && Storage::disk('public')->exists($team->gambar)) {
            Storage::disk('public')->delete($team->gambar);
        }

        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Data berhasil dihapus');
    }

    public function deletePhoto(Team $team)
    {
        if ($team->gambar && Storage::disk('public')->exists($team->gambar)) {
            Storage::disk('public')->delete($team->gambar);
        }

        $team->update(['gambar' => null]);

        return back()->with('success', 'Foto berhasil dihapus');
    }


}
