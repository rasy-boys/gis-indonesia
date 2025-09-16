<!DOCTYPE html>
<html lang="id" x-data="{ navOpen: false }" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Detail Pamflets | GIS INDONESIA</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
  body {
    font-family: 'Inter', sans-serif;
  }

  .all-info {
    display: block !important;
}

.all-info .single-info {
    display: block !important;
    margin-bottom: 8px !important;
}

.all-info .single-info span {
    font-weight: 600;
    width: 120px; /* sesuaikan lebar label */
    display: inline-block;
}

.team-details-content .personal-info {
    padding-bottom: 5px !important; /* sebelumnya 30px, dikurangi agar judul lebih dekat ke border */
    border-bottom: 1px solid #E7E7E7 !important;
}


</style>

</head>
<body class="bg-white text-gray-800">




<!-- tmp service section -->



@extends('layouts.layout1')

@php
    $title = 'About Us';
    $subtitle = 'About';
@endphp


@section('content')





<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg"
style="background-image: url('{{ asset('assets/images/banner/detail-tim.png') }}'); background-size: cover; background-position: center;">
       
<div class="absolute inset-0 bg-black/50 z-0"></div>
        
<div class="container relative z-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-inner text-center">
                <h1 class="title split-collab">DETAIL PAMFLETS </h1>
                <ul class="page-list">
                    <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                    <li class="tmp-breadcrumb-item active">pamflets</li>
                </ul>
                <div class="circle-1"></div>
            </div>
        </div>
    </div>
</div>
</div>


     <!-- Start Team Details Area  -->
     <div class="team-details-area tmp-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="team-details-thumb">
                        <div class="bg-white border border-green-200 flex justify-center items-center 
                        w-full max-w-[350px] h-[500px] rounded-lg shadow-md mx-auto overflow-hidden">
                <img src="{{ asset('storage/' . $pamflet->gambar) }}"
                     alt="team"
                     class="object-contain w-[100%] h-[100%] rounded-lg">
            </div>
            
                        
                        
                        
                       
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="team-details-content">
                        <div class="personal-info">
                            <h3 class="title">{{ $pamflet->judul }}</h3>
                        </div> 
                  
                
                    <p class="description text-gray-700 leading-relaxed mt-4 pl-3">
                      
                    </p>
              

                <div class="personal-experience">
                   
                    <p class="description">
                        {!! $pamflet->deskripsi !!}
                    </p>
                    



                </div>
                   
                </div>
            </div>

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
                        <div class="icon"><i class="fa-solid fa-alarm-clock"></i></div>
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
                    <h5 class="ft-title"> </h5>
                    <ul class="ft-link">
                        <li class="ft-location"></li>

                        <li>
                            <div class="single-contact">

                                <div class="icon">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                </div>

                                <div class="content">
                                    <span>E-mail:</span>
                                    <a href="mailto:sixgaming16@gmail.com">gisindonesia@gmail.com</a>
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
    <!-- End Team Details Area  -->

@endsection