<!DOCTYPE html>
<html lang="id" x-data="{ navOpen: false }" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>
  body {
    font-family: 'Inter', sans-serif;
  }
</style>

<style>
    .brand-inner {
      border-top: none !important;
      box-shadow: none !important;
      background-image: none !important;
      margin-top: 0.5rem !important;  /* jarak logo ke judul lebih rapat */
      padding-top: 0 !important;      /* hapus padding-top tema */
    }
    </style>
    
<style>
    .services-content .title {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .services-content .description {
        text-align: justify;
        font-size: 14px;
        line-height: 1.7;
    }
</style>

<style>
    .brand-area {
      border-top: none !important;
      box-shadow: none !important;
    }

    .tmp-section-gapTop {
    padding-top: 0 !important;
}

.section-head {
    text-align: center;
    padding-bottom: 40px !important;
}


.tmp-section-gapBottom {
    padding-bottom: 40px !important; /* lebih rapat dari 120px */
}

.pt-16 {
    padding-top: 0rem !important;
}

.about-description {
    margin-top: -30px; /* paksain naik */
    font-size: 15px;
    line-height: 1.6;
    color: #444;
    text-align: justify; /* biar rata kanan kiri */
}



.about-area.about-style-one .thumbnail-with-title .title {
    font-size: 17px !important;
    line-height: 30px;
    font-weight: var(--s-extra-bold);
    font-family: var(--font-secondary);
    color: var(--color-heading);
    margin-right: 15px !important; /* geser ke kiri */
}


    </style>
    
    


</head>
<body class="bg-white text-gray-800">

<!-- Header -->
<!-- HEADER -->
@extends('layouts.layout')

@php

    $bodyClass='index-five';

@endphp

@section('content')

<!-- tpm-header-area start -->
    <!-- tpm-header-area start -->
    <header class="tmp-header-area-start header-two header-four header-five header--sticky">
        

    </header>
    <!-- tpm-header-area end -->

    <x-sidebar/>
  


<!-- Hero -->
<!-- tmp banner area start -->
<div class="startup-banner-swiper-wrapper">
    <div class="swiper swiper-startup-banner">
        <div class="swiper-wrapper">
            
            @foreach($home as $item)
                <div class="swiper-slide">
                    <div class="tmp-banner-area banner-style-five tmp-section-gap bg-gray-800 relative"
                        style="background-image: url('{{ asset('storage/' . $item->image) }}'); background-size: cover; background-position: center;">
                        
                        <!-- Overlay gelap -->
                        <div class="absolute inset-0 bg-black/50 z-0"></div>
                    
                        <div class="container relative z-10">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-startup-main-content-wrapper text-center">
                                        <h1 class="title text-white" style="font-size: 83px">{{ $item->title }}</h1>
                                        <p class="disc text-white">{{ $item->description }}</p>
                                        <a href="/kontak" class="tmp-btn btn-primary">Kontak Kami</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Navigasi Swiper -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next" data-tmp-cursor="md transparent fw-bold" data-tmp-cursor-text="Next"></div>
        <div class="swiper-button-prev" data-tmp-cursor="md transparent fw-bold" data-tmp-cursor-text="Prev"></div>
    </div>
</div>

<!-- Tentang KAmi -->
<div class="about-area tmp-section-gap about-style-one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-thumbnails">
                    <div class="thumbnail">
                        <img src="{{ asset('assets/images/about/01-01.png') }}" alt="corporate business">

                        <div class="image-two">
                            <img src="{{ asset('assets/images/about/03-01.png') }}" alt="corporate business">
                        </div>

                        <div class="image-three animated">
                            <img class="" src="{{ asset('assets/images/about/02-01.png') }}" alt="corporate business">
                        </div>   
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-inner">
                    <div class="section-head text-align-left section-head-custom">
                        <div class="section-sub-title">
                            <img src="{{ asset('assets/images/services/icon2.png') }}" alt="Corporate_service">
                            <span class="subtitle">Tentang Kami</span>
                        </div>
                        <h2 class="title split-collab">
                            Ketahui lebih lanjut tentang <br> GIS Indonesia
                        </h2>
                    </div>
                    

                  <p class="about-description">
                    GIS Indonesia adalah platform website yang berfokus pada suatu hal yang berkaitan dengan data-data Geospasial di berbagai sektor. Data tersebut dapat membantu pemerintah atau industri dalam mengambil sebuah keputusan yang tepat dan strategis dari lokasi spasial yang dikaji. Kami menyediakan beberapa data spasial untuk beberapa daerah di Indonesia dan di perjual belikan pada platform E-Commerce kami.
                    </p>

  <!-- Three.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/three@0.150.1/build/three.min.js"></script>

<div class="thumbnail-with-title">
  <div id="globe-container" class="thumbnail globe-3d"></div>
  <div class="title">Memudahkan anda dalam kebutuhan data spasial anda.</div>
</div>

<style>
  .globe-3d {
    width: 100px;
    height: 100px;
    margin: auto;
    transform: translateX(-20px);
  }
</style>

<script>
  // Setup scene
  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 1000);
  const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
  renderer.setSize(100, 100);
  document.getElementById("globe-container").appendChild(renderer.domElement);

  // Buat bola globe
  const geometry = new THREE.SphereGeometry(1, 64, 64);
  const textureLoader = new THREE.TextureLoader();

  // GradientMap bawaan three.js untuk efek toon
  const gradientMap = textureLoader.load("https://threejs.org/examples/textures/gradientMaps/fiveTone.jpg");
  gradientMap.minFilter = THREE.NearestFilter; // biar efek toon tegas
  gradientMap.magFilter = THREE.NearestFilter;

  const material = new THREE.MeshToonMaterial({
    map: textureLoader.load("images/nasa.jpg"), // pakai file lokal kamu
    gradientMap: gradientMap
  });

  const globe = new THREE.Mesh(geometry, material);
  scene.add(globe);

  // Lighting
const light = new THREE.DirectionalLight(0xffffff, 1.5); // naikkan dari 1 ke 1.5
light.position.set(5, 5, 5);
scene.add(light);

const ambient = new THREE.AmbientLight(0x404040, 1); // naikkan dari 0.5 ke 1
scene.add(ambient);


  // Kamera
  camera.position.z = 3;

  // Animasi
  let t = 0;
  function animate() {
    requestAnimationFrame(animate);
    globe.rotation.y += 0.01;         // rotasi horizontal
    globe.rotation.x = Math.sin(t) * 0.05; // efek goyang
    t += 0.01;
    renderer.render(scene, camera);
  }
  animate();
</script>




                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Tentang Kami -->

      <!-- Stats Section with Icons -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-icon"><i class="fas fa-map-marked-alt"></i></div>
                <div class="stat-text">
                    <h3>100+</h3>
                    <p>Proyek Pemetaan</p>
                </div>

            </div>
            <div class="stat-item">
                <div class="stat-icon"><i class="fas fa-database"></i></div>
                <div class="stat-text">
                    <h3>1.3M+</h3>
                    <p>Data Spasial Terkumpul</p>
                </div>

            </div>
            <div class="stat-item">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <div class="stat-text">
                    <h3>146K+</h3>
                    <p>Pengguna & Mitra</p>
                </div>

        </div>
    </div>
</section>

<!-- Trusted Section -->
<section class="trusted-section">
    <div class="container">
        <div class="trusted-content">
            <h2>Dipercaya oleh</h2>
            <p>Lebih dari 500 Mitra & Klien di Seluruh Indonesia</p>
        </div>
        
    </div>
</section>



 <style>
    /* Trusted Section */
   .trusted-section {
    background: #7ce14a url('/images/bgt1.jpg') no-repeat center center;
    background-size: cover;
    padding: 60px 20px;
    text-align: center;
    margin-bottom: 80px;
   
}

.trusted-content {
    display: flex;
    justify-content: center; /* center horizontal */
    align-items: center;     /* center vertical antar teks */
    gap: 20px;
    flex-wrap: wrap;
}

.trusted-content h2 {
    font-size: 42px;
    color: #ffffff;
    font-weight: bold;
    margin: 0;
}

.trusted-content p {
    font-size: 32px;
    color: #ffffff;
    margin: 0;
    margin-top: 8px;
}

/* Responsive */
@media (max-width: 768px) {
    .trusted-content {
        flex-direction: column;
        gap: 10px;
    }
    .trusted-content h2 {
        font-size: 36px;
    }
    .trusted-content p {
        font-size: 24px;
    }
}


 /* Stats Section */
.stats-section {
    background-color: #e6f4ea; /* hijau muda */
    padding: 80px 20px; /* lebih tinggi */
    text-align: center;
}

.stats-grid {
    display: flex;
    justify-content: center;
    gap: 100px; /* lebih lebar jarak antar item */
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 30px; /* jarak ikon dan teks lebih lega */
    padding: 20px; /* biar ada ruang dalam */
}

.stat-icon {
    width: 80px;
    height: 80px;
    background-color: #2a7a42; /* hijau gelap */
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 36px; /* ikon lebih besar */
}

.stat-text h3 {
    font-size: 48px; /* angka lebih besar */
    color: #2a7a42;
    margin: 0;
    font-weight: bold;
}

.stat-text p {
    font-size: 20px; /* teks lebih besar */
    color: #3a3a3a;
    margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .stats-grid {
        flex-direction: column;
        gap: 40px; /* jarak antar item di mobile */
    }
    .stat-text h3 {
        font-size: 32px;
    }
    .stat-text p {
        font-size: 18px;
    }
    .icon {
        width: 60px;
        height: 60px;
        font-size: 28px;
    }
}


</style>


  <!-- Ruang Lingkup -->
<div class="service-area tmp-section-gapBottom" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <div class="section-head">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/icon2.png ') }}"src="{{ asset('assets/images/services/section-custom-menubar.png ') }}" alt="Business_Consulting_services">
                        <span>ruang lingkup</span>
                    </div>
                    <h2 class="title split-collab">Ketahui Lebih Lanjut Tentang Ruang Lingkup Kami</h2>
                </div>
            </div>
        </div>

        <div class="service-slider relative py-12 px-6 md:px-12 lg:px-24">
            <div class="max-w-full mx-auto">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @php
                            $slideCount = count($lingkups);
                            if ($slideCount < 6) {
                                $repeat = ceil(6 / $slideCount);
                            } elseif ($slideCount == 4) {
                                $repeat = 2;
                            } else {
                                $repeat = 1;
                            }
                        @endphp
                
                        @for ($i = 0; $i < $repeat; $i++)
                            @foreach ($lingkups as $lingkup)
                            <div class="swiper-slide flex justify-center">
                                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 flex flex-col"
                                        style="max-width: 360px; min-height: 430px; margin: 0 auto;">

                                        <!-- Bagian Gambar (50% fix) -->
                                        <div class="h-1/2 w-full bg-gray-100 flex items-center justify-center overflow-hidden">
                                            <img src="{{ asset('storage/' . $lingkup->icon) }}" 
                                                 alt="{{ $lingkup->title }}" 
                                                 class="max-h-full max-w-full">
                                        </div>
                                        

                                        <!-- Bagian Konten (50%) -->
                                        <div class="h-1/2 flex flex-col justify-center p-6 text-center">
                                            <h2 class="text-[20px] font-extrabold text-gray-900 mb-4">
                                                {{ $lingkup->title }}
                                            </h2>
                                            <p class="text-gray-600 text-[15px] leading-relaxed">
                                                {{ $lingkup->description }}
                                            </p>
                                            
                                        </div>
                                        
                                        
                                    </div>

                            </div>
                            
                            
                            @endforeach
                        @endfor
                    </div>
                </div>
                                
                
                
        
<!-- ✅ Custom class biar nggak tabrakan -->
<div class="swiper-pagination lingkup-pagination mt-6"></div>

                </div>
            </div>
        </div>
        
        </div>
                
    </div>
</div>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      loop: {{ count($lingkups) > 3 ? 'true' : 'false' }},
      loopedSlides: {{ count($lingkups) > 3 ? count($lingkups) : 0 }},
      spaceBetween: 0, 
      coverflowEffect: {
        rotate: 0,
        stretch: 130,   
        depth: 0,       
        modifier: 1,
        slideShadows: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".lingkup-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          let totalBullet = 4; // hanya 4 bullet yang mau ditampilkan
          if (index >= totalBullet) return "";
          return '<span class="' + className + '"></span>';
        },
      },
  
      // RESPONSIVE
      breakpoints: {
        0: {
          slidesPerView: 1
        },
        640: {
          slidesPerView: 2
        },
        1024: {
          slidesPerView: 2
        },
        1440: {
          slidesPerView: 3
        }
      }
    });
  </script>
  
    
  
  
  
  

<style>

.lingkup-pagination {
  position: relative !important;
  margin-top: 60px;
  text-align: center;
  z-index: 10;
}

.lingkup-pagination .swiper-pagination-bullet {
  background: #22c55e;   /* hijau */
  opacity: 0.5;
  width: 10px;
  height: 10px;
}

.lingkup-pagination .swiper-pagination-bullet-active {
  opacity: 1;
  background: #16a34a;   /* hijau lebih tua */
}


/* Pastikan slide auto height */
/* Biar shadow / scale tidak kepotong */
.service-slider .swiper {
  overflow: visible !important;
}

.max-w-8xl {
  max-width: 1300px; /* lebih lebar dari 7xl */
}


/* Pastikan wrapper juga tidak ngebatesin tinggi */
.service-slider .swiper-wrapper {
  align-items: stretch;
}

/* Tombol navigasi custom */
/* Tombol navigasi custom */
.custom-nav {
  width: 35px;
  height: 35px;
  background: #22c55e; /* hijau */
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}


/* Tombol di luar slider tapi dekat */
.swiper-button-prev {
  left: 60px; /* pas di luar kiri container */
}

.swiper-button-next {
  right: 60px; /* pas di luar kanan container */
}


/* Card penuh dan fleksibel */
/* Card styling */.mySwiper {
  padding: 0 15px;       
  max-width: 1200px;    
  margin: 0 auto;        
  overflow: hidden !important; 
}

.service-inner {
  max-width: 360px;
  min-height: 430px;
  margin: 0 auto;
  padding: 25px 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
/* 
Efek Blur */
/* Default slide normal */
.swiper-slide {
  transform: scale(1);  /* tetap normal */
/* agak redup biar beda */
  transition: transform 0.3s ease, opacity 0.3s ease;
}

/* Tengah menonjol */
.swiper-slide-active {
  transform: scale(1.1); /* lebih besar */
  opacity: 1;
  z-index: 2;
}




/* Tombol responsif */
.custom-nav {
  width: 35px;
  height: 35px;
}
.swiper-button-prev { left: 20px; }
.swiper-button-next { right: 20px; }

@media (min-width: 1024px) {
  .swiper-button-prev { left: 60px; }
  .swiper-button-next { right: 60px; }
}


    </style>


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
    margin-bottom: 60px;
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

<!-- Logo Kerja Sama -->
<div class="brand-area brand-area-custom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head section-head-brand">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/icon2.png') }}" alt="Corporate_service">
                        <span class="subtitle">Kerja Sama</span>
                    </div>
                    <h2 class="title split-collab">Kami Bekerja Sama Dengan</h2>
                </div>
            </div>

            <div class="brand-inner brand-inner-custom">
                @if($logos->count() > 4)
                    {{-- Slider --}}
                    <div class="swiper brandSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($logos as $logo)
                                <div class="swiper-slide flex justify-center">
                                    @if($logo->link)
                                        <a href="{{ $logo->link }}" target="_blank">
                                            <img src="{{ asset('storage/' . $logo->logo) }}"
                                                 alt="Brand Image"
                                                 class="brand-logo" />
                                        </a>
                                    @else
                                        <span>
                                            <img src="{{ asset('storage/' . $logo->logo) }}"
                                                 alt="Brand Image"
                                                 class="brand-logo" />
                                        </span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    {{-- Static List --}}
                    <ul class="brand-static-list">
                        @foreach ($logos as $logo)
                            <li>
                                @if($logo->link)
                                    <a href="{{ $logo->link }}" target="_blank">
                                        <img src="{{ asset('storage/' . $logo->logo) }}" alt="Brand Image" class="brand-logo" />
                                    </a>
                                @else
                                    <span>
                                        <img src="{{ asset('storage/' . $logo->logo) }}" alt="Brand Image" class="brand-logo" />
                                    </span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            
<style>
/* Brand Inner Custom */

/* Hanya untuk section brand */
.section-head.section-head-brand {
text-align: center;
padding-bottom: 1rem !important; /* hanya untuk brand */
}

.brand-inner-custom {
margin-top: 0.5rem !important;   /* jarak logo ke judul */
padding-bottom: 1rem !important; /* jarak ke section berikutnya */
}

/* Judul */
.section-head .title {
margin-bottom: 1rem !important;  /* rapatkan judul ke logo */
}

/* Static List */
.brand-static-list {
display: flex;
flex-wrap: wrap;
justify-content: center;
gap: 140px;
list-style: none;
margin: 0;
padding: 0;
}

.brand-static-list li {
display: flex;
justify-content: center;
align-items: flex-start;  /* dorong gambar ke atas */

width: auto;   /* menyesuaikan ukuran gambar */
height: auto;  /* menyesuaikan ukuran gambar */
}

.brand-logo {
max-width: 200px;   /* lebar maksimum 200px */
max-height: 150px;  /* tinggi maksimum 200px */
object-fit: contain; /* tetap proporsional */
}

/* Brand area bawah */
.brand-area.brand-area-custom {
padding-bottom: 5rem !important; /* hanya untuk brand area */
}
</style>      
        </div>
    </div>
</div>
<!-- End LogoKerja sama -->


<!-- Berita -->
<div class="tmp-blog-area tmp-section-gapBottom pt-16">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head">
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/icon2.png ') }}" alt="Corporate_service">
                        <span class="subtitle">BLOG TERBARU</span>
                    </div>
                    <h2 class="title split-collab">Berita Terbaru</h2>
                </div>
            </div>
        </div>

        
        <div class="row g-5">
            @if ($beritas->isEmpty())
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mx-auto">
                <div class="no-berita-card">
                    <p>Belum ada berita tersedia.</p>
                </div>
            </div>
        @endif
        
        
            @foreach ($beritas->take(3) as $berita)
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
                            <div class="blog-head" style="margin-top:-15px; margin-bottom:8px;">
                                <span class="name">{{ $berita->penulis }}</span>
                                <span class="designation">{{ $berita->kategori->nama ?? '-' }}</span>
                            </div>
                            
                            <div class="blog-body">
                                <a href="{{ route('info.berita.detail', $berita->slug) }}" class="title-area">
                                    <h4 class="title">{{ $berita->judul }}</h4>
                                </a>
                                @php
                                $konten = $berita->konten;
                            
                                // Optional: hapus tag HTML yang tidak aman
                                $konten = strip_tags($konten, '<p><strong><em><ul><ol><li>');
                            
                                // Potong 30 kata
                                $konten = \Illuminate\Support\Str::words($konten, 20, '...');
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

                <!-- Tombol Lihat Semua -->
                @if ($beritas->isNotEmpty())
    <div class="text-center" style="margin-top:50px;">
        <a href="/info/berita" 
           class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold text-2xl md:text-3xl py-3 px-12 rounded-lg shadow-lg transition-colors duration-300">
            Lihat Semua
        </a>     
    </div>
@endif

   

                
        <style>

.single-blog {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.blog-inner {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.blog-content {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: flex-start; /* ⬅️ isi ditarik ke atas */
}


.no-berita-card {
    text-align: center;
    padding: 40px 30px;
    border: 2px dashed #d1d5db; /* abu-abu lembut */
    border-radius: 12px;
    background: #f9fafb; /* abu-abu muda */
    transition: all 0.3s ease-in-out;
    min-height: 520px;      /* tinggi biar setara card berita */
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 100%;            /* penuh sesuai col grid */
}



.no-berita-card i {
    font-size: 40px;
    color: #9ca3af; /* abu-abu */
    margin-bottom: 12px;
}

.no-berita-card h5 {
    color: #374151; /* abu tua */
    margin-bottom: 6px;
    font-size: 18px;
    font-weight: 600;
}

.no-berita-card p {
    color: #6b7280; /* abu sedang */
    font-size: 14px;
    margin: 0;
}

.no-berita-card:hover {
    background: #ffffff;
    border-color: #9ca3af;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}


            
            .single-blog .thumbnail img {
    width: 100%;
    height: 250px; /* atur tinggi seragam */
    object-fit: cover; /* biar gak kepotong */
    background-color: #f9f9f9; /* kasih background netral */
    border-radius: 8px; /* opsional biar modern */
    padding: 5px; /* biar ada jarak */
}
    </style>

        
        
    </div>
</div>
<!-- End Berita -->

<div class="testimonial-with-brand bg-cover bg-center bg-no-repeat "
style="background-image: url('{{ asset('assets/images/testimonial/bg-01.png') }}')">


   <!-- Start Testimonial Area  -->
   <div class="testimonial-brand-area tmp-section-gapTop">
       <div class="container">
           
           <div class="row">
               <div class="col-lg-12">
                   <div class="testimonials-button-area">
                    <div class="section-head text-align-left" style="margin-top: 20px;">
                        <div class="section-sub-title">
                            <img src="{{ asset('assets/images/services/icon2.png') }}" alt="Corporate_service">
                            <span class="subtitle">Testimoni Pelanggan</span>
                        </div>
                        <h2 class="title split-collab">
                            Apa yang orang-orang katakan<br> Tentang GIS Indonesia
                        </h2>
                    </div>
                    
   
                       <div class="button-next-prev">
                           <div class="swiper-button-prev"></div>
                           <div class="swiper-button-next"></div>
                       </div>
                   </div>
               </div>
           </div>
   
           <div class="row">
               <div class="col-lg-12">
                   <!-- Slider main container -->
                   <div class="swiper-style-one tmp-section-gapBottom">
                       <div class="swiper-container-style-two">
                           <!-- Additional required wrapper -->
                           <div class="swiper-wrapper">
   
                               @foreach ($testimonials as $testimonial)
                                   <div class="swiper-slide">
                                       <div class="single-card card-horizontal">
                                           <div class="card-inner">
                                               <div class="content">
                                                   <div class="rating rating-style-three">
                                                       <div class="stars-group">
                                                           <div class="star">
                                                               @for ($i = 1; $i <= 5; $i++)
                                                                   @if ($i <= $testimonial->rating)
                                                                       <i class="fa-solid fa-star"></i>
                                                                   @elseif ($i - 0.5 == $testimonial->rating)
                                                                       <i class="fa-solid fa-star-half-stroke"></i>
                                                                   @else
                                                                       <i class="fa-regular fa-star"></i>
                                                                   @endif
                                                               @endfor
                                                           </div>
                                                       </div>
                                                   </div>
   
                                                   <p class="description">{!! $testimonial->deskripsi_singkat !!}</p>
   
                                                   <div class="content content-without-bg">
                                                       <div class="name">{{ $testimonial->nama }}</div>
                                                       <div class="designation">{{ $testimonial->jabatan }}</div>
                                                   </div>
                                               </div>
   
                                               <div class="thumbnail">
                                                   <div class="icon icon-quote">
                                                       <i class="fa-duotone fa-quote-left"></i>
                                                   </div>
                                                   <img src="{{ asset('storage/' . $testimonial->gambar) }}" 
                                                        alt="testimonial"
                                                        style="width:120px; height:120px; border-radius:50%; object-fit:cover;">
                                               </div>
                                               
                                           </div>
                                       </div>
                                   </div>
                               @endforeach
   
                           </div>
                           <!-- End swiper-wrapper -->
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   
   <!-- End Testimonial Area  -->
   <!-- Start Brand Area  -->
   <!-- End Brand Area  -->
</div>

   <!-- Start Footer Area  -->
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
                                     <a href="/profile/visi-misi">Visi Misi</a>
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
     <!-- End Footer Area  -->
 
 
 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 
 <script>
     new Swiper(".brandSwiper", {
         slidesPerView: 4,
         spaceBetween: 30,
         loop: true,
         autoplay: {
             delay: 2000,
             disableOnInteraction: false,
         },
         breakpoints: {
             320: { slidesPerView: 2 },
             640: { slidesPerView: 3 },
             1024: { slidesPerView: 4 }
         }
     });
 </script>
 

@endsection