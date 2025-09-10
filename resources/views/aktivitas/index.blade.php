<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aktivitas | GIS Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    @extends('layouts.layout')
    
    @php
        $title = 'About Us';
        $subtitle = 'About';
    @endphp
    
    
    @section('content')

    <div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg">
    

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title split-collab">Latar Belakang</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                        <li class="tmp-breadcrumb-item active">Latar Belakang</li>
                    </ul>
                    <div class="circle-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Konten -->
    <main class="max-w-7xl mx-auto py-12 px-4">
        <h2 class="text-3xl font-bold text-green-700 mb-10 text-center">Kegiatan Terkini</h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- KONTEN BERITA -->
            <div class="lg:col-span-2 space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($beritas as $berita)
                    <a href="{{ route('info.berita.detail', $berita->slug) }}">
                        <div class="bg-white p-5 rounded-xl border shadow hover:shadow-md transition hover:bg-green-50 flex flex-col justify-between min-h-[460px]">
                            <!-- Gambar -->
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 class="w-full h-48 object-cover rounded mb-4">
            
                            <!-- Judul -->
                            <h3 class="text-xl font-bold text-green-700 leading-snug mb-2">
                                {{ $berita->judul }}
                            </h3>
            
                            <!-- Tanggal -->
                            <p class="text-sm text-gray-500 mb-1">
                                <i class="far fa-calendar-alt mr-1"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </p>
            
                            <!-- Deskripsi -->
                            <p class="text-gray-700 text-sm mb-3 line-clamp-3">
                                {{ $berita->deskripsi }}
                            </p>
            
                            <!-- Tombol -->
                            <span class="text-green-600 hover:underline text-sm font-medium mt-auto">Baca selengkapnya</span>
                        </div>
                    </a>
                @endforeach
            </div>
            
            

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $beritas->links('pagination::tailwind-green') }}

                </div>
            </div>

            <!-- SIDEBAR RECENT POSTS -->
           <!-- SIDEBAR: Recent Post -->
           <aside class="space-y-8">
            <!-- RECENT POSTS -->
            <div>
                <h3 class="text-xl font-bold text-green-700 mb-4 border-b pb-2">Postingan Terbaru</h3>
                @foreach ($recentPosts as $recent)
                    <a href="{{ route('info.berita.detail', $recent->slug) }}"
                       class="flex items-start gap-4 bg-white p-3 rounded-xl shadow hover:shadow-md transition hover:bg-green-50">
                        <img src="{{ asset('storage/' . $recent->gambar) }}"
                             alt="{{ $recent->judul }}"
                             class="w-16 h-16 object-cover rounded-md shadow-sm">
                        <div>
                            <p class="text-sm font-semibold text-green-800 leading-snug">{{ Str::limit($recent->judul, 50) }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="far fa-calendar-alt mr-1"></i>{{ \Carbon\Carbon::parse($recent->tanggal)->translatedFormat('d M Y') }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        
            <!-- KATEGORI -->
            <div>
                <h3 class="text-xl font-bold text-green-700 mb-4 border-b pb-2">Kategori</h3>
                <ul class="text-sm space-y-2">
                    <li>
                        <a href="{{ route('aktivitas.index') }}" class="text-gray-700 hover:text-green-700 hover:underline">
                            Kegiatan / Aktivitas
                        </a>
                    </li>
                </ul>
            </div>
        
            <!-- ARCHIVES -->
            <div>
                <h3 class="text-xl font-bold text-green-700 mb-4 border-b pb-2">Arsip</h3>
                <ul class="text-sm space-y-2">
                    @foreach ($archiveYears as $year)
                        <li>
                            <a href="{{ route('info.berita.archive', ['year' => $year]) }}"
                               class="text-gray-700 hover:text-green-700 hover:underline">
                                {{ $year }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600 mt-12 border-t">
        &copy; {{ date('Y') }} GIS Indonesia. All rights reserved.
    </footer>

</body>
</html>
