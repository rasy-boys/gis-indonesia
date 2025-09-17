<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Visi & Misi | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   
</head>
<style>
    /* Section Spacing */
.tmp-section-gap {
    padding: 80px 0;
}

.section-padding {
    padding: 60px 0;
}

.bg-gradient {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

/* Hero Section */
.hero-content .title {
    font-size: 42px;
    font-weight: 700;
    color: #2c3e50;
    line-height: 1.2;
    margin-bottom: 20px;
}

.hero-content .description {
    font-size: 16px;
    color: #666;
    line-height: 1.6;
    margin-bottom: 0;
}

/* Image Containers */
.hero-image-container,
.vision-image-container {
    width: 100%;
    aspect-ratio: 16/10; /* Landscape ratio untuk hero dan vision */
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    position: relative;
}

/* Mission Image Container - Portrait 9:16 */
.mission-image-container {
    width: 100%;
    aspect-ratio: 9/16; /* Portrait ratio untuk mission */
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    position: relative;
    max-height: 600px; /* Tinggi maksimal diperbesar */
    max-width: 350px; /* Batasi lebar maksimal */
    margin: 0 auto; /* Center alignment */
}

.hero-image,
.vision-image,
.mission-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.3s ease;
}

.hero-image-container:hover .hero-image,
.vision-image-container:hover .vision-image,
.mission-image-container:hover .mission-image {
    transform: scale(1.05);
}

/* Vision Section */
.vision-section {
    position: relative;
}

.vision-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
    padding-left: 30px;
}

/* Mission Section */
.mission-section {
    position: relative;
}

.mission-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
    padding-right: 30px;
}

/* Vision Card */
.vision-card {
    background: white;
    padding: 35px;
    border-radius: 20px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    position: relative;
    margin: 25px 0;
}

.vision-card .quote-icon {
    position: absolute;
    top: -15px;
    left: 30px;
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #22d34b 0%, #15c045 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
}

.vision-card blockquote {
    font-size: 17px;
    font-style: italic;
    color: #2c3e50;
    line-height: 1.6;
    margin: 20px 0 0 0;
    font-weight: 500;
}

/* Mission List */
.mission-list {
    margin-top: 25px;
}

.mission-item {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    padding: 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.mission-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.mission-item:last-child {
    margin-bottom: 0;
}

.mission-number {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    font-weight: 700;
    flex-shrink: 0;
}

.mission-content-item h4 {
    font-size: 18px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
}

.mission-content-item p {
    color: #666;
    line-height: 1.6;
    margin: 0;
    font-size: 14px;
}

/* Section Headers */
.section-head .title {
    font-size: 32px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.section-sub-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
}

.section-sub-title .subtitle {
    font-size: 14px;
    font-weight: 600;
    color: #26ca4c;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.section-sub-title img {
    width: 10px;
    height: auto;
}

/* Responsive Design */
@media (max-width: 1199px) {
    .vision-content {
        padding-left: 20px;
    }
    
    .mission-content {
        padding-right: 20px;
    }
    
    .mission-image-container {
        max-height: 550px;
        max-width: 300px;
    }
}

@media (max-width: 991px) {
    .tmp-section-gap {
        padding: 60px 0;
    }
    
    .section-padding {
        padding: 40px 0;
    }

    .hero-content .title {
        font-size: 36px;
    }

    .vision-content,
    .mission-content {
        padding-left: 0;
        padding-right: 0;
        margin-top: 30px;
    }

    .vision-image-container {
        aspect-ratio: 16/10;
        margin-bottom: 30px;
    }
    
    .mission-image-container {
        aspect-ratio: 9/16;
        margin-bottom: 30px;
        max-height: 500px;
        max-width: 280px;
    }
    
    .hero-image-container {
        aspect-ratio: 16/10;
        margin-bottom: 30px;
    }

    .mission-section .order-lg-1 {
        order: 2;
    }

    .mission-section .order-lg-2 {
        order: 1;
    }
}

@media (max-width: 768px) {
    .tmp-section-gap {
        padding: 50px 0;
    }
    
    .section-padding {
        padding: 35px 0;
    }

    .hero-content .title {
        font-size: 30px;
    }
    
    .section-head .title {
        font-size: 28px;
    }

    .vision-image-container {
        aspect-ratio: 16/9;
        margin-bottom: 25px;
    }
    
    .mission-image-container {
        aspect-ratio: 9/16;
        margin-bottom: 25px;
        max-height: 450px;
        max-width: 250px;
    }
    
    .hero-image-container {
        aspect-ratio: 16/9;
        margin-bottom: 25px;
    }
    
    .vision-card {
        padding: 25px;
        margin: 20px 0;
    }
    
    .vision-card blockquote {
        font-size: 16px;
    }
    
    .mission-item {
        flex-direction: column;
        text-align: center;
        gap: 15px;
        padding: 20px 15px;
    }
    
    .mission-number {
        margin: 0 auto;
        width: 45px;
        height: 45px;
        font-size: 18px;
    }
}

@media (max-width: 576px) {
    .tmp-section-gap {
        padding: 40px 0;
    }
    
    .section-padding {
        padding: 30px 0;
    }

    .hero-content .title {
        font-size: 26px;
    }
    
    .section-head .title {
        font-size: 24px;
    }

    .vision-image-container {
        aspect-ratio: 4/3;
        margin-bottom: 20px;
    }
    
    .mission-image-container {
        aspect-ratio: 9/16;
        margin-bottom: 20px;
        max-height: 400px;
        max-width: 220px;
    }
    
    .hero-image-container {
        aspect-ratio: 4/3;
        margin-bottom: 20px;
    }
    
    .vision-card blockquote {
        font-size: 15px;
    }
    
    .mission-content-item h4 {
        font-size: 16px;
    }
    
    .mission-content-item p {
        font-size: 13px;
    }

    .mission-item {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .vision-image-container {
        aspect-ratio: 1/1;
    }
    
    .mission-image-container {
        aspect-ratio: 9/16;
        max-height: 350px;
        max-width: 200px;
    }
    
    .hero-image-container {
        aspect-ratio: 1/1;
    }
}

.section-head {
    text-align: center;
    padding-bottom: 0px !important;
}

body .bg-light {
    background-color: transparent !important;
}

    </style>
<body class="bg-gray-50 text-gray-800 leading-relaxed">

    <!-- Navbar User -->
    <!DOCTYPE html>
    <html lang="id" x-data="{ navOpen: false }" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <title>GIS Indonesia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Inter', sans-serif;
      }
    </style>
    
    </head>
    <body class="bg-white text-gray-800">
    
    
    @extends('layouts.layout')
    
    @php
        $title = 'About Us';
        $subtitle = 'About';
    @endphp
    
    
    @section('content')

 <!-- Header / Banner -->
<div class="breadcrumb-area tmp-section-gap breadcrumb-bg"
style="background-image: url('{{ asset('assets/images/banner/visi1.jpg') }}'); background-size: cover; background-position: center;">


    <div class="absolute inset-0 bg-black/50 z-0"></div>
                    
    <div class="container relative z-0">
   <div class="row">
    
       <div class="col-lg-12">
           <div class="breadcrumb-inner text-center text-white py-20">
            <h1 class="title split-collab">VISI & MISI</h1>
            <ul class="page-list">
                <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                <li class="tmp-breadcrumb-item active">Visi & Misi</li>
            </ul>
               <div class="circle-1"></div>
           </div>
       </div>
   </div>
</div>
</div>

<div class="about-area about-style-three tmp-section-gap bg-white py-16">
    <div class="container">

        <!-- Judul Utama -->
         <div class="row">
            <div class="col-lg-12">
                <div class="section-head">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/icon2.png ') }}" alt="Corporate_service">
                        <span class="subtitle">visi-misi</span>
                    </div>
                    <h2 class="title split-collab">Visi & Misi GIS Indonesia</h2>
                </div>
            </div>
        </div>
    
        {{-- Bagian Visi --}}
      {{-- Bagian Visi --}}
        <!-- Vision Section -->
    <div class="vision-section section-padding">
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-6">
                    <div class="vision-image-container">
                        <img src="{{ asset('assets/images/about/visi.jpg') }}" 
                             alt="Vision Envitech" 
                             class="vision-image" 
                             style="width:100%; height:80%;">
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <div class="vision-content">
                        <div class="section-head text-align-left">
                           
                            <h2 class="title split-collab">Visi Kami</h2>
                        </div>
                        <div class="vision-card">
                            <div class="quote-icon">
                                <i class="fa-duotone fa-quote-left"></i>
                            </div>
                            <blockquote>
                                Menjadi pusat sistem informasi geografis (GIS) data-data spasial di Indonesia dalam satu platform.
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Bagian Misi --}}
     <!-- Mission Section -->
     <div class="mission-section section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-2 d-flex">
                    <div class="mission-image-container">
                        <img src="{{ asset('assets/images/about/misi.jpg') }}" alt="Mission Envitech" class="mission-image">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1 d-flex">
                    <div class="mission-content">
                        <div class="section-head text-align-left">
                           
                            <h2 class="title split-collab">Misi Kami</h2>
                        </div>
                        
                        <div class="mission-list">
                            <div class="mission-item">
                                <div class="mission-number">01</div>
                                <div class="mission-content-item">
                                    <h4>Menjadi Pusat Data-data spasial di Indonesia</h4>
                                    <p>GIS.ID berupaya menjadi salah satu platform terbaik dalam penyediaan data spasial di Indonesia</p>
                                </div>
                            </div>
                            
                            <div class="mission-item">
                                <div class="mission-number">02</div>
                                <div class="mission-content-item">
                                    <h4>Mendukung Transformasi Digital</h4>
                                    <p>Mendorong pemanfaatan teknologi GIS untuk mendukung transformasi digital di berbagai sektor.</p>
                                </div>
                            </div>
                        
                            <div class="mission-item">
                                <div class="mission-number">03</div>
                                <div class="mission-content-item">
                                    <h4>Meningkatkan Akses Informasi Geospasial</h4>
                                    <p>Menyediakan solusi dan layanan GIS yang memudahkan akses, pengelolaan, dan pemanfaatan data geospasial.</p>
                                </div>
                            </div>
                        
                            <div class="mission-item">
                                <div class="mission-number">04</div>
                                <div class="mission-content-item">
                                    <h4>Kolaborasi dan Inovasi</h4>
                                    <p>Menjalin kemitraan strategis untuk mendorong inovasi dan pengembangan teknologi GIS di Indonesia.</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>



         <!-- CTA Section -->
         <section class="cta-section">
            <div class="cta-container">
                <h2>Saatnya Meningkatkan Keputusan Strategis Bersama GIS Indonesia</h2>
                {{-- <p>Data spasial akurat membantu Anda mengambil keputusan yang tepat, cepat, dan strategis.</p> --}}
                <a href="/kontak" class="cta-btn">Hubungi Kami</a>
            </div>
        </section>
        <style>
            /* CTA Section */
        /* CTA Section */
        /* CTA Section */
        .cta-section {
            background: #7ce14a url('/images/bgt1.jpg') no-repeat center center;
            /* hijau sedikit lebih gelap + putih hijau lembut */
            background-size: cover;
            color: #fff;
            padding: 60px 20px;
            text-align: center;
            /* border-radius: 12px; */
            /* margin-bottom: 60px; */
        }
        
        
        .cta-section h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.3;
            color: #fff; /* teks putih */
        }
        
        .cta-section p {
            font-size: 23px;
            margin-bottom: 30px;
            color: #fff; /* teks putih */
        }
        
        .cta-btn {
            display: inline-block;
            background: #fff;
            color: rgb(35, 228, 32); /* hijau utama */
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .cta-btn:hover {
            background: #d8fadc; /* putih kehijauan */
            color: #145a26;
        }
        
        
        </style>
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
            
                    @if ($recentPosts->isEmpty())
                    <div class="no-recent-post">
                        <div class="icon">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <p>Belum ada postingan terbaru.</p>
                    </div>
                @else
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
                @endif
            </div>
        </div>

        <style>
            .no-recent-post {
            text-align: center;
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            padding: 20px;
            background: #f9fbf9;
            margin-top: 10px;
        }

        .no-recent-post .icon {
            font-size: 32px;
            color: #6b7280; /* abu-abu */
            margin-bottom: 8px;
        }

        .no-recent-post p {
            font-size: 14px;
            color: #374151; /* abu gelap */
            margin: 0;
        }

        </style>
            
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-wrapper">
                    <h5 class="ft-title"></h5>
                    <ul class="ft-link">
                        <li class="ft-location"> </li>

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
