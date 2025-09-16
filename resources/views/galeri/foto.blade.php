<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri Foto | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>

.mb-7 {
    margin-bottom: 5rem !important;
    
}

.tmp-section-gap {
    padding: 70px 0 !important;
}


    </style>

    <!-- TARUH DI <head> ATAU FILE CSS TERPISAH -->
<style>
    /* ====== Grid dasar ====== */
    /* ====== Grid Album ====== */
/* ====== Grid Album ====== */
.albums-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 24px;
}

.album-title {
    text-transform: uppercase;
    font-weight: bold;
    font-size: 1.5rem; /* Sesuaikan biar besar */
    letter-spacing: 1px; /* Biar agak renggang */
}

.albums-col {
    grid-column: span 12;
}
@media (min-width: 576px) { .albums-col { grid-column: span 6; } }
@media (min-width: 992px) { .albums-col { grid-column: span 4; } }

/* ====== Kartu Album ====== */
.album-card {
    background: #ffffff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 28px rgba(0,0,0,.08);
    transition: transform .35s ease, box-shadow .35s ease;
    position: relative;
}
.album-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 40px rgba(0,0,0,.12);
}

/* ====== Area Gambar ====== */
.album-cover-wrap {
    display: block;
    position: relative;
}

.album-cover {
    width: 100%;
    height: 250px; /* atur tinggi sesuai kebutuhan */
    object-fit: contain; /* biar gambar full, tidak terpotong */
    background-color: #ffffff; /* kasih background biar rapi kalau aspect ratio beda */
    border-radius: 8px; /* opsional, kalau mau rounded */
}


.album-empty {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 250px; /* sama dengan tinggi gambar */
    border-radius: 8px;
    background-color: #f8f8f8;
}

.album-card:hover .album-cover {
    transform: scale(1.1);
}

/* ====== Badge Tahun ====== */
.badge-year {
    position: absolute;
    top: 12px;
    left: 12px;
    background: #16a34a;
    color: white;
    padding: 10px 18px;
    font-size: 1rem; /* lebih besar */
    font-weight: bold;
    border-radius: 999px;
}

/* ====== Badge Foto & Video (kanan atas) ====== */
.album-media {
    position: absolute;
    top: 12px;
    right: 12px;
    display: flex;
    gap: 8px;
}

.album-media span {
    background: rgba(0, 0, 0, 0.6); /* transparan biar gak ganggu cover */
    color: #fff;
    padding: 6px 10px;
    font-size: 0.85rem;
    border-radius: 999px;
    display: flex;
    align-items: center;
    gap: 5px;
    font-weight: 600;
}


/* ====== Overlay Hover ====== */
.album-overlay {
    position: absolute;
    inset: 0;
    display: grid;
    place-items: center;
    padding: 20px;
    background: rgba(22, 163, 74, 0.75); /* hijau transparan */
    opacity: 0;
    transition: opacity .35s ease;
}
.album-card:hover .album-overlay {
    opacity: 1;
}
.overlay-content {
    text-align: center;
    color: white;
}
.overlay-icon {
    font-size: 42px;
    margin-bottom: 10px;
}
.overlay-title {
    font-weight: 900;
    font-size: clamp(1.6rem, 1.2rem + 1.5vw, 2.4rem); /* BESAR */
    line-height: 1.2;
}
.overlay-sub {
    font-size: 1.2rem;
    margin-top: 6px;
}

/* ====== Konten Bawah ====== */
.album-body {
    padding: 18px 20px;
    position: relative;
}
.album-title {
    font-weight: 900;
    font-size: clamp(1.4rem, 1rem + 1.2vw, 2rem); /* besar */
    line-height: 1.2;
    margin-bottom: 4px;
    color: #0b1726;
    text-decoration: none;
}
.album-title:hover {
    color: #16a34a;
}

/* Jumlah foto & video di kanan bawah */
.album-stats {
    position: absolute;
    right: 16px;
    bottom: 16px;
    display: flex;           /* sejajar horizontal */
    gap: 8px;                /* jarak antar item */
    align-items: center;     /* rata vertikal */
}
.album-stats span {
    background: #16a34a;
    color: white;
    padding: 6px 12px;
    border-radius: 999px;
    font-weight: bold;
    font-size: 1rem;
    display: flex;           /* biar icon & teks rapi */
    align-items: center;
    gap: 6px;                /* jarak icon dan teks */
}

.overlay-empty {
    margin-top: 8px;
    font-size: 0.9rem;
    color: #ff4444; /* merah biar jelas */
    font-weight: bold;
}

/* ====== Search Bar ====== */
/* ====== Search Bar ====== */
.album-search-wrap {
    display: flex;
    flex-direction: column;   /* Biar konten ke bawah, bukan sejajar */
    align-items: center;      /* Tetap rata tengah */
    gap: 20px;                /* Jarak antara no-result dan search bar */
    margin-bottom: 45px;
}


.album-search {
    display: flex;
    align-items: center;
    background: #fff;
    border-radius: 50px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    max-width: 450px;
    width: 100%;
}

.album-search-input {
    flex: 1;
    padding: 12px 20px;
    border: none;
    outline: none;
    font-size: 15px;
}

.album-search-input:focus {
    outline: none !important;
    box-shadow: none !important;
    border: none !important;
}


.album-search-btn {
    background: linear-gradient(135deg, #4CAF50, #2E7D32);
    border: none;
    padding: 12px 18px;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    transition: background 0.3s ease;
}

.album-search-btn:hover {
    background: linear-gradient(135deg, #43A047, #1B5E20);
}

.no-result {
    text-align: center;
    padding: 40px 20px;
    background: #f9fafb;
    border-radius: 12px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.06);
    margin: 20px auto;
    max-width: 500px;
}

.no-result h4 {
    font-size: 1.2rem;
    color: #444;
    margin-bottom: 15px;
}

.no-result h4 span {
    color: #16a34a; /* hijau sama kaya theme kamu */
    font-weight: bold;
}

.no-result .back-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #4CAF50, #2E7D32);
    color: #fff;
    padding: 10px 18px;
    border-radius: 30px;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.3s ease;
}

.no-result .back-btn:hover {
    background: linear-gradient(135deg, #43A047, #1B5E20);
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
        style="background-image: url('{{ asset('assets/images/banner/galeri1.jpg') }}'); background-size: cover; background-position: center;">
 
        <div class="container ">
     
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Foto & Video</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Foto & Video</li>
                        </ul>
                        <div class="circle-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   

    <!-- Konten Utama -->
    <div class="service-area tmp-section-gapBottom" id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="section-head text-center">
                        <div class="section-sub-title center-title mb-2">
                            <img src="{{ asset('assets/images/services/icon2.png') }}" alt="Icon">
                   
                            <span>Foto & Video</span>
                        </div>
                        <h2 class="title split-collab">Mari Lihat Album Kami</h2>
                    </div>
                </div>
            </div>
    
           
      


           {{-- TARUH DI TEMPAT LIST ALBUM --}}
           <div class="album-search-wrap">
            @if($albums->isEmpty() && request('q'))
    <div class="no-result">
        <h4>
            Tidak ada hasil untuk "<span>{{ request('q') }}</span>"
        </h4>
        <a href="{{ route('galeri.foto') }}" class="back-btn">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>
@endif

            <form action="{{ route('galeri.foto') }}" method="GET" class="album-search">
                <input 
                    type="text" 
                    name="q" 
                    class="album-search-input" 
                    placeholder="Cari album..." 
                    value="{{ request('q') }}">
                <button type="submit" class="album-search-btn">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        
           <div class="row">
            <div class="col-lg-12">
                <div class="albums-grid">
                    @forelse ($albums as $album)
                    @php
                    $fotos = $album->galeriFotos->where('kategori_id', 1); // hanya foto
                    $videos = $album->galeriFotos->where('kategori_id', 2); // hanya video
                    
                    $firstFoto = $fotos->first();
                    $firstVideo = $videos->first();
                    
                    if($firstFoto?->foto) {
                        $cover = asset('storage/' . $firstFoto->foto);
                    } elseif($firstVideo?->video_link) {
                        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/shorts\/)([^\&\?\/]+)/', $firstVideo->video_link, $matches);
                        $youtubeId = $matches[1] ?? null;
                        $cover = $youtubeId ? "https://img.youtube.com/vi/$youtubeId/hqdefault.jpg" : asset('images/default-cover.jpg');
                    } else {
                        $cover = asset('images/default-cover.jpg');
                    }
                    
                    $jumlahFoto = $fotos->count();
                    $jumlahVideo = $videos->count();
                    @endphp
                    
                
        
                        <div class="albums-col">
                            <div class="album-card">
                                <a href="{{ route('galeri.album-show', $album->id) }}" class="album-cover-wrap">
                                    @if($album->nama === 'Tanpa Album')
                                    <img class="album-cover" src="{{ asset('images/image.png') }}" alt="Tanpa Album">
                                @elseif($jumlahFoto > 0 || $jumlahVideo > 0)
                                    <img class="album-cover" src="{{ $cover }}" alt="Cover {{ $album->nama }}">
                                @else
                                    <div class="album-cover album-empty">
                                        <i class="fa-solid fa-image-slash text-5xl text-gray-400"></i>
                                        <p class="mt-2 text-gray-500">Belum Ada Konten</p>
                                    </div>
                                @endif
                                
                                  <!-- Tahun kiri atas -->
                                  @if($album->tahun)
    <span class="badge-year">{{ $album->tahun }}</span>
@endif


                                    <!-- Foto & Video kanan atas -->
                                    <div class="album-media">
                                        <span><i class="fa-regular fa-images"></i> {{ $jumlahFoto }}</span>
                                        <span><i class="fa-solid fa-video"></i> {{ $jumlahVideo }}</span>
                                    </div>

                                  
                                
                                    <!-- Overlay hover -->
                                    <div class="album-overlay">
                                        <div class="overlay-content">
                                            <i class="fa-solid fa-eye overlay-icon"></i>
                                            <div class="overlay-title">{{ $album->nama }}</div>
                                            <div class="overlay-sub">
                                                {{ $jumlahFoto }} Foto • {{ $jumlahVideo }} Video
                                            </div>
                                            @if($jumlahFoto === 0 && $jumlahVideo === 0)
                                                <div class="overlay-empty">Album ini masih kosong 📭</div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                                
        
                              
                            </div>
                        </div>
                    @empty
                        <div class="albums-col">
                            <p class="text-center">Belum ada album untuk ditampilkan.</p>
                        </div>
                    @endforelse
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


  


    <!-- Footer -->
  
    <!-- Script Modal -->

    {{-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var grid = document.querySelector('.portfolio-feed');
    var iso = new Isotope(grid, {
        itemSelector: '.element-item',
        layoutMode: 'fitRows'
    });

    var filterButtons = document.querySelectorAll('.filters-button-group .button');
    filterButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var filterValue = button.getAttribute('data-filter');
            iso.arrange({ filter: filterValue });

            filterButtons.forEach(btn => btn.classList.remove('is-checked'));
            button.classList.add('is-checked');
        });
    });
});
</script>

<script>
    function openModal(imageUrl) {
      document.getElementById('modal-img').src = imageUrl;
      document.getElementById('modal').classList.remove('hidden');
    }
    
    function closeModal() {
      document.getElementById('modal').classList.add('hidden');
      document.getElementById('modal-img').src = '';
    }
    
    // Tutup modal kalau klik di luar gambar
    document.getElementById('modal').addEventListener('click', function(e) {
      if (e.target.id === 'modal') {
        closeModal();
      }
    });
    </script>
     --}}

    {{-- <script>
        function openModal(imageUrl, description) {
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('modalDescription').textContent = description;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('imageModal').classList.remove('flex');
        }

        window.addEventListener('click', function (e) {
            const modal = document.getElementById('imageModal');
            if (e.target === modal) {
                closeModal();
            }
        });
    </script> --}}

</body>
</html>
