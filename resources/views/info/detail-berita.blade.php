<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $berita->judul }} | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
    .single-blog-recent-post-sidebar a.thumbnail {
        display: flex;
        align-items: center;
        gap: 10px; /* jarak antara gambar & teks */
        margin-bottom: 20px; /* jarak antar posting */
    }
    
    .single-blog-recent-post-sidebar a.thumbnail img {
        display: block;
        border-radius: 6px; /* opsional, biar sudut agak tumpul */
    }
    </style>

<style>
    .single-blog-recent-post-sidebar img {
        filter: brightness(0.65); /* 1 = normal, semakin kecil semakin gelap */
        transition: filter 0.3s ease;
    }
    
    .single-blog-recent-post-sidebar img:hover {
        filter: brightness(1); /* kembali normal saat hover */
    }

    .breadcrumb-inner .title {
    font-size: 28px;       /* bisa kamu sesuaikan */
    line-height: 1.4;      /* biar jarak antar baris enak */
    word-wrap: break-word; /* biar kata panjang pecah */
    word-break: break-word;
    max-width: 80%;        /* biar ga full layar */
    margin: 0 auto 15px;   /* biar center dan ada jarak ke breadcrumb */
    text-align: center;
}
.breadcrumb-inner .page-list {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;       /* kalau panjang tetap rapi */
    gap: 8px;              /* jarak antar item */
}

.breadcrumb-inner .tmp-breadcrumb-item.active {
    font-size: 14px;
    max-width: 300px;
    word-break: break-word; /* kalau panjang, turun ke bawah */
    text-align: center;
}


    
    </style>
    
    

@extends('layouts.layout')




@section('content')

<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg"
    style="background-image: url('{{ asset('storage/' . $berita->gambar) }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black/50 z-0"></div>
        <div class="container relative z-10">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title split-collab">Detail-Berita</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ $berita->judul }}</li>
                    </ul>
                    <div class="circle-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- tmp service section -->
<div class="tmp-service-section tmp-section-gap">
<div class="container">
<div class="row">
    <div class="col-lg-8">
        
        <div class="blog-details-left-area border-bottom">
            {{-- Gambar utama --}}
            <div class="thumbnail-top">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                    class="rounded-xl shadow-lg mb-6 w-full h-auto">
            </div>
        
            <div class="blog-details-discription">
                {{-- Penulis & kategori --}}
                <div class="category-area">
                    {{ $berita->penulis }} / {{ $berita->kategori->nama ?? '-' }} - {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
                </div>
        
                {{-- Tanggal singkat dengan ikon kalender --}}
            
        
                {{-- Judul berita --}}
                <h3 class="title split-collab mb-6">{{ $berita->judul }}</h3>
        
                {{-- Pecah konten jadi paragraf --}}
                @foreach (preg_split("/\r\n|\n|\r/", strip_tags($berita->konten, '<strong><em><ul><ol><li>')) as $paragraf)
                    @if (trim($paragraf) !== '')
                        <p class="disc mb-4 leading-relaxed">{!! $paragraf !!}</p>
                    @endif
                @endforeach
                
        
                {{-- Gambar tambahan jika ada --}}
                @if ($berita->images->count())
                <div class="row g-5 mt-4">
                    @foreach ($berita->images as $img)
                        <div class="col-lg-6">
                            <div class="thumbnail-50">
                                <img src="{{ asset('storage/' . $img->gambar) }}" alt="Foto Tambahan"
                                    class="rounded-lg shadow-md w-full object-contain max-h-[300px] bg-gray-100">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            
            </div>
        </div>
                
        
        <div class="blog-details-bottom-area mt--40">
            <div class="tag-socila-area-blgo-details">
                <div class="left-tag">
                    <span>Tag:</span>
                    <div class="tag-wrapper">
                        @foreach($berita->tags as $tag)
                            <div class="signle-wrapper">
                                <a href="{{ route('info.berita.tag', $tag->id) }}">
                                {{ $tag->nama }}
                            </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="social-blog-tag-area flex items-center gap-3">
    <span>Bagikan:</span>
    <ul class="flex gap-2">
        {{-- Facebook --}}
        @if($berita->facebook ?? true)
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
        </li>
        @endif
        {{-- Twitter --}}
        @if($berita->twitter ?? true)
        <li>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($berita->judul) }}" target="_blank">
                <i class="fa-brands fa-twitter"></i>
            </a>
        </li>
        @endif
        {{-- LinkedIn --}}
        <li>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($berita->judul) }}" target="_blank">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>
        </li>
        {{-- Copy Link --}}
        {{-- <li>
            <button id="copyButton" class="px-2 py-1 border rounded hover:bg-green-600 hover:text-white">
                <i class="fa-regular fa-copy"></i>
            </button>
        </li> --}}
    </ul>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const copyButton = document.getElementById('copyButton');
    copyButton.addEventListener('click', function() {
        navigator.clipboard.writeText(window.location.href)
            .then(() => alert('Link berita berhasil disalin!'))
            .catch(err => alert('Gagal menyalin link: ' + err));
    });
});
</script>

                
               
                
            </div>

          

        </div>
    </div>
    <div class="col-lg-4 pl--50 pl_md--10 pl_sm--10 mt_md--50 mt_sm--50">
        <div class="side-bar-details-page">
            <!-- single bar -->
            
            <div class="signle-side-bar search-area">
                <form action="{{ route('info.berita') }}" method="GET" class="search-filter">
                    <div class="body">
                      <div class="search-area" style="position: relative;">
                        <input 
                          type="text" 
                          name="search" 
                          value="{{ request('search') }}" 
                          placeholder="Cari berita..."
                          
                        />
                        <button 
                          type="submit" 
                         
                          aria-label="Submit search"
                        >
                          <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                  
            </div>
          
            <!-- single bar end -->
            <!-- single bar -->
            <div class="signle-side-bar category-area">
                <div class="header">
                    <h3 class="title">Daftar Kategori</h3>
                </div>
                <div class="body">
                    @foreach($categories as $kategori)
                    <a href="{{ route('info.berita.kategori', urlencode($kategori->nama)) }}" class="single-category">
                        <p>{{ $kategori->nama }}</p>
                        <i class="fa-light fa-arrow-right"></i>
                    </a>
                @endforeach
                
                </div>
            </div>
            
            
            <!-- single bar end -->
            <div class="signle-side-bar recent-post">
                <div class="header">
                    <h3 class="title">Postingan terbaru</h3>
                </div>
                <div class="body mt--50">
                    <!-- single blog-post sidevar -->
                    <div class="single-blog-recent-post-sidebar">
                        @foreach ($recentPosts->take(3)  as $recent)
                        <a href="{{ route('info.berita.detail', $recent->slug) }}" class="thumbnail">
                            <img src="{{ asset('storage/' . $recent->gambar) }}" alt="blog-Post">
                            <div class="inner">
                                <span class="post-time">
                                    <i class="fa-regular fa-clock"></i>
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
                                </span>
                                <h6 class="title">
                                    {{ $recent->judul }}

                                </h6>
                            </div>
                        </a>
                        @endforeach
                    </div>
            </div>
            </div>
            <!-- single bar end -->
            <div class="signle-side-bar tags">
                <div class="header">
                    <h3 class="title">Tags Populer</h3>
                </div>
                <div class="body mt--50">
                    <div class="tags-wrapper-side-bar">
                        @foreach($popularTags as $tag)
                            <div class="signle-tag-side-bar">
                                <a href="{{ route('info.berita.tag', $tag->id) }}">
                                    <button>{{ $tag->nama }}</button>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- single bar -->
          
            <!-- single bar end -->
        </div>
    </div>
</div>
</div>
</div>
<!-- tmp service section end -->

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

@endsection