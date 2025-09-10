<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struktur Organisasi | GIS Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
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
    <main class="max-w-5xl mx-auto py-10 px-6">
        <h2 class="text-3xl font-bold text-green-700 mb-6">Struktur Organisasi</h2>

        <!-- Gambar Struktur Organisasi -->
        <div class="mb-8">
            <img src="https://via.placeholder.com/1000x600?text=Struktur+Organisasi" alt="Struktur Organisasi">
        </div>

        <!-- (Opsional) Daftar Jabatan -->
        <ul class="list-disc list-inside text-lg text-gray-700 space-y-2">
            <li>Direktur Utama: Budi Santoso</li>
            <li>Wakil Direktur: Siti Aminah</li>
            <li>Kepala Divisi Teknologi: Dedi Pratama</li>
            <li>Kepala Divisi Pelatihan: Rina Kurniawati</li>
            <!-- Tambahkan lainnya sesuai kebutuhan -->
        </ul>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600 mt-12">
        &copy; {{ date('Y') }} GIS Indonesia. All rights reserved.
    </footer>

</body>
</html>
