<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Berita; // Tambahkan ini

class KontakController extends Controller
{
    public function index()
    {
        $recentPosts = Berita::orderBy('created_at', 'desc')->take(2)->get();
        return view('kontak', compact('recentPosts'));
    }

    public function send(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
            'captcha' => 'required|captcha', // wajib
        ]);
    
        try {
            // Coba kirim email
            Mail::to('oklawati85@gmail.com')->send(new ContactMail($validated));
        } catch (\Exception $e) {
            // Kalau error, tampilkan pesan error langsung
            return back()->with('error', 'Gagal kirim email: ' . $e->getMessage())
                         ->withInput();
        }
    
        // Kalau berhasil, tampilkan pesan sukses
        return back()->with('success', 'Pesan berhasil dikirim!');
    }
    
}
