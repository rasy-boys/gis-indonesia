<!DOCTYPE html>
<html lang="id" x-data="{ navOpen: false }" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Team | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- DataTables + Tailwind -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">
</head>

<body class="bg-white text-gray-800">



@extends('layouts.layout')

@php
    $title = 'Team Members';
    $subtitle = 'Team';
@endphp


@section('content')


<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg relative"
    style="background-image: url('{{ asset('assets/images/banner/team1.jpg') }}'); background-size: cover; background-position: center;">
    
    <!-- Overlay -->
  
                    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center text-white">
                    <h1 class="title split-collab">TIM KAMI</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                        <li class="tmp-breadcrumb-item active">Tim Kami</li>
                    </ul>
                    <div class="circle-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="team-area tmp-section-gap bg-white">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="section-head">
                <div class="section-sub-title center-title">
                    <img src="{{ asset('assets/images/services/icon2.png ') }}" alt="Corporate_service">
                    <span class="subtitle">TIM KAMI</span>
                </div>
                <h2 class="title split-collab">Kenali Tim Kami</h2>
            </div>
        </div>
    </div>
    <div class="container my-2 p-3">
        <!-- Form Pencarian & Tombol Kembali -->
     <!-- Search Bar -->
     <div class="d-flex justify-content-between mb-3 align-items-center">
        <!-- Search Bar di kiri -->
        <form action="{{ route('team') }}" method="GET" class="search-bar">
            <input 
                type="text" 
                name="search" 
                value="{{ $search ?? '' }}" 
                placeholder="Cari nama..." 
                class="form-control"
            >
            <button type="submit" class="btn-search">
                <i class="fa fa-magnifying-glass"></i>
            </button>
        </form>
    
        <!-- Tombol Kembali di kanan -->
        @if(!empty($search))
        <a href="{{ route('team') }}" class="btn-back">
            Kembali
        </a>
        @endif
    </div>

    <style>
        /* ===== Search Bar Modern ===== */
.search-bar {
    display: flex;
    border: 1px solid #d0e6d6;
    border-radius: 8px;
    overflow: hidden;
    background: #fff;
    height: 42px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.search-bar input {
    border: none;
    padding: 0 12px;
    outline: none;
    flex: 1;
    font-size: 14px;
    color: #333;
}

.search-bar input::placeholder {
    color: #aaa;
}

.btn-search {
    background: #83f86e; /* hijau muda fresh */
    border: none;
    padding: 0 16px;
    cursor: pointer;
    transition: 0.2s;
    color: #090909;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-search:hover {
    background: #28a745; /* hijau lebih gelap saat hover */
    color: #fff;
}

/* ===== Tombol Kembali Modern ===== */
.btn-back {
    background: #f0f0f0;
    color: #333;
    padding: 0 18px;
    height: 42px;
    font-weight: 500;
    font-size: 14px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: 0.2s;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.btn-back:hover {
    background: #d6d6d6;
}
</style>
    

        
    
        <!-- Tabel untuk Desktop -->
      <!-- Tabel untuk Desktop -->
<!-- Tabel untuk Desktop -->
<!-- Tabel untuk Desktop -->
<!-- Tabel untuk Desktop -->
<div class="d-none d-md-block">
    <div class="table-responsive shadow rounded">
        <table class="table table-hover align-middle mb-0 modern-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Pengalaman</th>
                    <th>Keahlian</th>
                    <th>Lihat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team as $t)
                <tr>
                    <td class="fw-bold text-start">{{ $t->nama }}</td>
                    <td>{{ $t->jabatan }}</td>
                    <td>{{ $t->pengalaman }} tahun</td>
                    <td>
                        @php
                            $skills = json_decode($t->keahlian, true) ?? [];
                        @endphp
                    
                        @if(!empty($skills))
                            @foreach($skills as $skill)
                            <span class="inline-block border border-black text-black text-lg font-semibold px-2 py-1 rounded mb-1 bg-white">
                                {{ $skill['value'] ?? '' }}
                            </span>
                            
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                    

                    <td class="text-center">
                        <a href="{{ route('team.show', $t->slug) }}" class="btn btn-outline-success btn-sm">
                            <i class="fa fa-eye"></i> Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




        
    
        <!-- Card untuk Mobile -->
<!-- Mobile Version -->
<div class="d-block d-md-none">
    <div class="row g-3">
        @foreach ($team as $t)
        <div class="col-12">
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $t->nama }}</h5>
                    <p class="card-text mb-1"><strong>Jabatan:</strong> {{ $t->jabatan }}</p>
                    <p class="card-text mb-1"><strong>Pengalaman:</strong> {{ $t->pengalaman }} tahun</p>
                    <p class="card-text mb-2"><strong>Keahlian:</strong>
                        @php
                            $skills = json_decode($t->keahlian, true) ?? [];
                        @endphp
                        @if(!empty($skills))
                            @foreach($skills as $skill)
                                <span class="d-inline-block border border-black text-black px-2 py-1 rounded mb-1 me-1 bg-white">
                                    {{ $skill['value'] ?? '' }}
                                </span>
                            @endforeach
                        @else
                            -
                        @endif
                    </p>
                    <a href="{{ route('team.show', $t->slug) }}" class="btn btn-outline-success btn-sm w-100">
                        <i class="fa fa-eye"></i> Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


    
        <!-- Pagination -->
       <!-- Pagination -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
    <div class="text-muted small mb-2 mb-md-0">
        Menampilkan <span class="fw-semibold">{{ $team->firstItem() }}</span> - 
        <span class="fw-semibold">{{ $team->lastItem() }}</span> 
        dari <span class="fw-semibold">{{ $team->total() }}</span> data
    </div>

    <div>
        {{ $team->links('pagination.custom-bootstrap-5') }}
    </div>
</div>

        
        <!-- CSS untuk ubah warna pagination jadi hijau -->
        <style>
            .pagination .page-item.active .page-link {
                background-color: #28a745; /* hijau */
                border-color: #28a745;
            }
            .pagination .page-link {
                color: #28a745;
            }
            .pagination .page-link:hover {
                background-color: #218838;
                color: #fff;
                border-color: #1e7e34;
            }

            @media only screen and (min-width: 768px) and (max-width: 991px) {
    .tmp-section-gap {
        padding: 0px 0;
    }
}

.tmp-section-gap {
    padding: 80px 0;
}

/* Efek hover baris tabel */
/* Hover efek */
/* Efek hover lebih soft */
.modern-table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    border-radius: 12px;
    overflow: hidden;
    font-size: 15px;
    background-color: #ffffff;
    border: 1px solid #e0e0e0; /* border luar tabel */
}

.modern-table thead {
    background: #83f86e; /* hijau muda fresh */
    color: #090909; /* hijau gelap biar kontras */
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.modern-table thead th {
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid #dcdcdc; /* garis bawah header */
}

.modern-table tbody tr {
    transition: all 0.2s ease-in-out;
}

.modern-table tbody td {
    padding: 12px 14px;
    color: #333;
    border-bottom: 1px solid #e6e6e6; /* garis horizontal tipis */
    border-right: 1px solid #e6e6e6;  /* garis vertikal tipis */
}

/* hilangkan border kanan terakhir biar bersih */
.modern-table tbody td:last-child,
.modern-table thead th:last-child {
    border-right: none;
}

.modern-table tbody tr:hover {
    background: #e8f8f3; /* efek hover hijau sangat muda */
    transform: scale(1.01);
}

/* tombol biar ikut modern */
.modern-table .btn {
    border-radius: 6px;
    font-size: 13px;
    padding: 4px 10px;
    transition: 0.2s;
}

.modern-table .btn:hover {
    background: #28a745;
    color: #fff;
}




        </style>
        
    </div>
    
    
    
    
    
    
    </div>
</div>

 
   
 


<footer class="footer-area footer-style-one-wrapper" 
style="background-image: url('{{ asset('assets/images/footer/bg-03.png') }}'); background-repeat: no-repeat; background-size: cover;">

<div class="container py-8">
   
    <div class="footer-main footer-style-one">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-wrapper border-right mr--20">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('assets/images/logo/logo-03-2.png') }}" alt="logo"
                                 class="w-[100px] md:w-[140px] lg:w-[200px] h-auto object-contain">
                        </a>
                    </div>

                    <p class="description">
                        Platform Geospasial Information System Indonesia
                    </p>


                    <div class="day-time">
                        <div class="icon"><i class="fa-solid fa-clock"></i></div>
                        <div class="content">
                            <div class="day">Senin - Jumat</div>
                            <div class="time">8:00  – 15:00 </div>
                        </div>
                    </div>

                    <ul class="social-icons solid-social-icons rounded-social-icons">
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="single-footer-wrapper pl-50 pl_md--0 pl_sm--0">
                    <h5 class="ft-title">Link Cepat</h5>
                    <ul class="ft-link">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/profile/latar-belakang">Profil</a>
                        </li>
                        <li>
                            <a href="/profile/visi-misi">Visi-Misi</a>
                        </li>
                        <li>
                            <a href="/team">Tim Kami</a>
                        </li>
                      

                        <li>
                            <a href="/galeri/foto">Foto & Video</a>
                        </li>

                        <li>
                            <a href="/kontak">Kontak Kami</a>
                        </li>

                    </ul>

                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-wrapper pr--15">
                    <h5 class="ft-title">Postingan Terbaru</h5>
            
                    @foreach ($recentPosts as $recent)
                    <div class="single-post flex items-start gap-3 mb-4">
                        <div class="thumbnail w-16 h-16 overflow-hidden rounded">
                            <a href="{{ route('info.berita.detail', $recent->slug) }}">
                                <img src="{{ asset('storage/' . $recent->gambar) }}" alt="{{ $recent->judul }}" class="object-cover w-full h-full">
                            </a>
                        </div>
                        <div class="content text-sm">
                            <div class="date text-gray-500 text-xs mb-1">
                                <i class="fa-light fa-calendar-days"></i>
                                <span>{{ \Carbon\Carbon::parse($recent->tanggal)->translatedFormat('d M Y') }}</span>
                            </div>
                            <a href="{{ route('info.berita.detail', $recent->slug) }}" class="hover:underline">
                                <h6 class="title font-medium leading-snug">
                                    {{ Str::limit($recent->judul, 50) }}
                                </h6>
                            </a>
                        </div>
                    </div>
                    @endforeach
            
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-wrapper">
                    <h5 class="ft-title">Info Resmi:</h5>
                    <ul class="ft-link">
                        <li class="ft-location"> Jl. Mercurius No.4 Blk. C, RW.5, Ciherang, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680</li>

                        <li>
                            <div class="single-contact">

                                <div class="icon">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                </div>

                                <div class="content">
                                    <span>E-mail:</span>
                                    <a href="mailto:sixgaming16@gmail.com">info@gis.id</a>
                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="single-contact">
                                <div class="icon">
                                    <i class="fa-light fa-phone"></i>
                                </div>
                                <div class="content">
                                    <span>Phone:</span>
                                    <a href="tel:+4733378901">+62 811-1919-711</a>
                                </div>

                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<div class="copyright-area-one">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-wrapper">
                <p>© Copyright 2025. All Rights Reserved by <a href="#">GIS</a></p>
            </div>
        </div>
    </div>
</div>
</div>

@endsection


<!-- jQuery & DataTables -->






