<!DOCTYPE html>
<html lang="id" x-data="{ navOpen: false }" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Profil GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
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
    }

    .tmp-section-gapTop {
    padding-top: 0 !important;
}

.section-head {
    text-align: center;
    padding-bottom: 40px !important;
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


@extends('layouts.layout')

@php
    $title = 'About Us';
    $subtitle = 'About';
@endphp


@section('content')

<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg"
     @if ($data && $data->image)
        style="background-image: url('{{ asset('storage/' . $data->image) }}'); background-size: cover; background-position: center;"
     @endif
     >
     <div class="absolute inset-0 bg-black/50 z-0"></div>
                    
     <div class="container relative z-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title split-collab">Profil</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                        <li class="tmp-breadcrumb-item active">Profil</li>
                    </ul>
                    <div class="circle-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- End Breadcrumb area -->

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

<div class="thumbnail-with-title" 
     style="display:flex; align-items:center; gap:12px; justify-content:center;">

  <div id="globe-container" class="thumbnail globe-3d"></div>

  <div class="title" style="font-size:18px; font-weight:500;">
    Memudahkan anda dalam kebutuhan data spasial anda.
  </div>
</div>

<style>
  .globe-3d {
  width: 100px;
  height: 100px;
  /* hapus yang bikin ke tengah */
  margin: 0;               
  transform: none;         
}


   /* Tablet */
   @media (max-width: 768px) {
    .globe-3d {
      width: 80px;
      height: 80px;
    }
    .thumbnail-with-title .title {
      font-size: 16px;
    }
  }
/* HP */
@media (max-width: 480px) {
  .thumbnail-with-title {
    display: flex;
    align-items: center;    /* sejajarkan globe & teks */
    justify-content: flex-start; 
    gap: 8px;
  }

  .globe-3d {
    width: 60px;
    height: 60px;
    flex-shrink: 0;         /* globe nggak mengecil */
  }

  .thumbnail-with-title .title {
    font-size: 14px;
    line-height: 1.4;
    max-width: 70%;         /* batasi lebar teks biar nggak nabrak */
    text-align: left;
    margin-top: 30px;
  }
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
    map: textureLoader.load("/images/nasa.jpg"), // pakai file lokal kamu
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

    <!-- working process -->
    <!-- Tmp Servisec Processs Area Two Start -->
    <div class="tpm-services-process-area tmp-section-gapBottom">
        <div class="container">
            <div class="row" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <div class="col-lg-12">
                    <div class="section-head">
                        <div class="section-sub-title center-title">
                            <img src="{{ asset('assets/images/services/icon2.png ') }}" alt="Corporate_service">
                            <span class="subtitle">
                                TIM KAMI</span>
                        </div>
                        <h2 class="title split-collab">Mari Kenali Tim Kami</h2>
                    </div>
                </div>
            </div>
            <div class="team-description-card">
                <div class="team-card">
                    <p>
                        Tim profesional GIS Indonesia siap membantu kebutuhan geospasial Anda. Kenali anggota tim kami yang berdedikasi dan berpengalaman.
                    </p>
                    <a href="/team">
                        Lihat Selengkapnya
                    </a>
                </div>
            </div>
            
            <style>
            .team-description {
                margin-top: -20px; /* tetap dipertahankan */
                text-align: center;
            }
            
            /* Card wrapper */
            .team-description-card {
                display: flex;
                justify-content: center;
            }
            
            /* Card itu sendiri */
            .team-card {
                background-color: #fff;
                border-radius: 0.75rem; /* lebih rounded */
                box-shadow: 0 8px 20px rgba(0,0,0,0.2);
                padding: 4rem 3rem; /* lebih besar */
                max-width: 60rem; /* sekitar 960px, lebih lebar */
                text-align: center;
                transition: transform 0.3s, box-shadow 0.3s;
            }
            
            /* Efek hover */
            .team-card:hover {
                transform: scale(1.05);
                box-shadow: 0 16px 32px rgba(0,0,0,0.25);
            }
            
            .team-card p {
                color: #2D3748;
                margin-bottom: 2.5rem;
                font-size: 1.5rem; /* lebih besar */
                font-weight: 600;
                line-height: 2;
            }
            
            .team-card a {
                display: inline-block;
                background-color: #16A34A;
                color: #fff;
                font-weight: 700;
                font-size: 1.25rem; /* tombol jumbo */
                padding: 1.25rem 2.5rem; /* lebih besar */
                border-radius: 0.5rem;
                transition: background-color 0.3s, transform 0.3s;
                text-decoration: none;
            }
            
            .team-card a:hover {
                background-color: #15803D;
                transform: scale(1.08); /* tombol lebih terasa saat hover */
            }
            </style>
                                                
           
        </div>
    </div>
    <!-- Tmp Servisec Processs Area Two End -->
    <!-- working process end -->

    
    </div>
    
    

    <!-- Start Testimonial with brand  -->
   
        <!-- End Testimonial Area  -->



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

@endsection




<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".brandSwiper", {
        slidesPerView: 4,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        breakpoints: {
            320: { slidesPerView: 2 },
            640: { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
        }
    });
});
</script>

</body>
</html>