<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kerja Sama | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<style>


.breadcrumb-area {
    padding-bottom: 60px; /* atau 80px kalau mau lebih jauh */
}

    </style>

    
<style>
    .brand-inner {
      border-top: none !important;
      box-shadow: none !important;
      background-image: none !important;
    }
    </style>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    @extends('layouts.layout')
    
   
    
    @section('content')

   <div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg mb-20"
        style="background-image: url('{{ asset('assets/images/banner/kerjasama1.jpg') }}'); background-size: cover; background-position: center;">
       
          
                    
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">KerjaSama</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Kerja Sama</li>
                        </ul>
                        <div class="circle-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="brand-area mt-12 mb-16" style="margin-bottom: 6rem;">
        <!-- Hilangkan tmp-section-gapBottom -->
        <div class="container max-w-7xl mx-auto px-4">
          <div class="row">
            <div class="col-lg-12">
                <div class="section-head mb-6"> <!-- kasih margin-bottom 1.5rem -->
                    <div class="section-sub-title center-title">
                        <img src="{{ asset('assets/images/services/icon2.png') }}" alt="Corporate_service">
                        <span class="subtitle">Kerja Sama</span>
                    </div>
                    <h2 class="title split-collab">Kami Bekerja Sama Dengan</h2>
                </div>
            </div>
          </div>
    
          <div class="brand-inner" style="margin-top: 0.5rem;"> <!-- Hilangkan tmp-section-gapTop dan pakai margin-top kecil -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
              @foreach ($logos as $logo)
                <div class="flex justify-center items-center p-4 bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                  <a href="{{ $logo->link }}" target="_blank" class="block">
                    <img src="{{ asset('storage/' . $logo->logo) }}" alt="Brand Image" class="h-42 max-w-[180px] w-auto object-contain mx-auto" />
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
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

</body>
</html>
