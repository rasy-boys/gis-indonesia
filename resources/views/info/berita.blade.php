<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Berita | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
.breadcrumb-area {
    padding-bottom: 60px; /* atau 80px kalau mau lebih jauh */
}
.form-container {
  margin-bottom: 1rem; /* atau 0.5rem kalau mau lebih dekat */
}

form.search-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 1rem;
  }
  form.search-filter input[type="text"],
  form.search-filter select {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    flex: 1 1 300px; /* responsive */
    font-size: 14px;
  }
  form.search-filter button {
    background-color: #16a34a; /* hijau */
    color: white;
    border: none;
    padding: 8px 18px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s ease;
  }
  form.search-filter button:hover {
    background-color: #15803d;
    
  }

  .mb-7 {
    margin-bottom: 7rem !important;
    
}

.tmp-section-gap {
    padding: 50px 0 !important;
}
    </style>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    @extends('layouts.layout')
    
    @php
        $title = 'About Us';
        $subtitle = 'About';
    @endphp
    
    
    @section('content')

         

    <div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg mb-7"
        style="background-image: url('{{ asset('assets/images/banner/berita1.jpg') }}'); background-size: cover; background-position: center;">
       
            
                    
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Berita</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Berita</li>
                        </ul>
                        <div class="circle-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="search-wrapper">
        <form action="{{ route('info.berita') }}" method="GET" class="search-form">
            
            <!-- Filter Tahun -->
            <select name="tahun" class="filter-select">
                <option value="">Tahun</option>
                @foreach($archiveYears as $year)
                    <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
    
            <!-- Filter Kategori -->
            <select name="kategori" class="filter-select">
                <option value="">Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('kategori') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>
    
            <!-- Search Input + Button -->
            <div class="search-input-wrapper">
                <span class="search-icon"><i class="fas fa-search"></i></span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..." class="search-input">
                <button type="submit" class="search-btn"><i class="fas fa-arrow-right"></i></button>
            </div>
    
        </form>
    </div>
    
    <style>
    .search-wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 1rem !important;
        padding: 0 1rem;
    }
    
    .search-form {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        width: 100%;
        max-width: 700px;
    }
    
    /* Filters kecil di kiri */
    .filter-select {
        flex: 0 0 120px;
        padding: 8px 12px;
        border-radius: 30px;
        border: 1px solid #ccc;
        background: #fff;
        cursor: pointer;
    }
    
    /* Search input bulat */
    .search-input-wrapper {
        display: flex;
        align-items: center;
        flex: 1 1 auto;
        border: 1px solid #ccc;
        border-radius: 50px;
        padding: 5px 10px;
        background: #fff;
    }
    
    .search-input-wrapper .search-icon {
        margin-right: 8px;
        color: #999;
        font-size: 16px;
    }
    
    .search-input-wrapper .search-input {
        flex: 1;
        border: none;
        outline: none;
        padding: 8px 10px;
        font-size: 16px;
        border-radius: 50px;
    }
    
    .search-input-wrapper .search-btn {
        border: none;
        background: #3ad842;
        color: #fff;
        padding: 6px 12px;
        border-radius: 50px;
        cursor: pointer;
        margin-left: 8px;
    }
    
    .search-input-wrapper .search-btn:hover {
        background: #50d328;
    }
    
    /* Responsive */
    @media screen and (max-width: 640px) {
        .filter-select, .search-input-wrapper {
            flex: 1 1 100%;
        }
    }
    .thumbnail {
    width: 100%;
    height: 250px; /* semua thumbnail seragam tingginya */
    overflow: hidden;
    border-radius: 8px; /* opsional biar ada sudut melengkung */
    background: #f9f9f9; /* warna background kalau gambar nggak nutup */
}

.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* gambar penuh, bisa kepotong dikit */
    display: block;
}



    </style>
    
    

    

    <div class="altest-blog-area tmp-section-gap">
        <div class="container">
            <div class="row g-5">
                @foreach ($beritas as $berita)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="single-blog">
                        <div class="blog-inner">
                            <div class="thumbnail">
                                <a href="{{ route('info.berita.detail', $berita->slug) }}">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Business Consulting Blog">
                                </a>
                                <div class="pmt-blog-meta">
                                    <ul class="all-meta">
                                        <li class="date">
                                            <span>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d') }}</span>
                                        </li>
                                        <li class="month">
                                            <span>{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('M, Y') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="blog-content">
                                <div class="blog-head">
                                    <span class="name">{{ $berita->penulis }}</span>
                                    <span class="designation">{{ $berita->kategori->nama ?? '-' }}</span>
                                </div>
                                <div class="blog-body">
                                    <a href="{{ route('info.berita.detail', $berita->slug) }}" class="title-area">
                                        <h4 class="title">{{ $berita->judul }}</h4>
                                    </a>
                                    @php
                                    // Ambil konten asli
                                    $konten = $berita->konten;
                                
                                    // Optional: hapus tag HTML yang tidak aman
                                    $konten = strip_tags($konten, '<p><strong><em><ul><ol><li>');
                                
                                    // Potong 30 kata
                                    $konten = \Illuminate\Support\Str::words($konten, 30, '...');
                                @endphp
                                
                                <p class="description">
                                    {!! $konten !!}
                                </p>
                                
                                    
                                </div>
                                <a class="btn-read-more" href="{{ route('info.berita.detail', $berita->slug) }}">
                                    <span class="read-more-text">Selengkapnya</span>
                                    <span class="read-more-icon"><i class="fa-solid fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    
                <div class="tmp-pagination-area-next-pev mt--50">
                  {{ $beritas->links('pagination.custom-bootstrap-5') }}
                </div>

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
                        <h5 class="ft-title"> Link Cepat</h5>
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
                
                        @foreach ($recentPostss as $recent)
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

</body>
</html>
