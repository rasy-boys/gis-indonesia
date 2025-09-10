<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pelatihan & Pendampingan | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<style>
.breadcrumb-area {
    padding-bottom: 60px;
}
.mb-7 {
    margin-bottom: 1rem !important;
}
</style>


    <!-- Navbar -->
    @extends('layouts.layout')
    

    
    @section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg mb-7"
        style="background-image: url('{{ asset('assets/images/banner/pelatihan1.jpg') }}'); background-size: cover; background-position: center;">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">PELATIHAN</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Pelatihan</li>
                        </ul>
                        <div class="circle-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Pamflet Aktif -->
<div class="pamflet-section container my-5">
    <h2 class="mb-4" style="color:#2d7a2f; font-weight:600; text-align:center;">
        Pamflet Yang Akan Datang
    </h2>
    
    <div class="pamflet-grid">
        @foreach ($comingSoon as $pamflet)
        <a href="{{ route('pamflet.show', $pamflet->id) }}" class="pamflet-card" title="{{ $pamflet->judul }}">
            <div class="pamflet-img-wrapper">
                <img src="{{ asset('storage/' . $pamflet->gambar) }}" alt="{{ $pamflet->judul }}">
                <div class="overlay">
                    <p class="overlay-title">{{ Str::limit($pamflet->judul, 30) }}</p>
                    <p class="overlay-date">{{ \Carbon\Carbon::parse($pamflet->tanggal_mulai)->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($pamflet->tanggal_selesai)->translatedFormat('d M Y') }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

<!-- Pamflet Expired -->
<div class="pamflet-section container my-5">
    <h2 class="mb-4" style="font-weight:600;  text-align:center;">Pamflet yang Sudah Terlaksana</h2>
    <div class="pamflet-grid">
        @foreach ($expired as $pamflet)
        <a href="{{ route('pamflet.show', $pamflet->id) }}" class="pamflet-card expired" title="{{ $pamflet->judul }}">
            <div class="pamflet-img-wrapper">
                <img src="{{ asset('storage/' . $pamflet->gambar) }}" alt="{{ $pamflet->judul }}">
                <div class="overlay">
                    <p class="overlay-title">{{ Str::limit($pamflet->judul, 30) }}</p>
                    <p class="overlay-date">Berakhir: {{ \Carbon\Carbon::parse($pamflet->tanggal_selesai)->translatedFormat('d M Y') }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

<style>
.pamflet-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 item per baris */
    gap: 10px; /* jarak antar card lebih rapat, tidak terlalu jauh */
}


.pamflet-card {
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 220px; /* lebar card */
    margin: 0 auto;
}

.pamflet-img-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    width: 100%;
    /* max-height dihapus agar gambar tidak terpotong */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.pamflet-img-wrapper img {
    width: 100%;
    height: auto; /* biar proporsional */
    display: block;
    object-fit: contain; /* tampil seluruh gambar tanpa crop */
    transition: transform 0.3s;
}

.pamflet-card:hover .pamflet-img-wrapper img {
    transform: scale(1.05); /* zoom halus */
}


/* Overlay untuk hover */
.overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    background: rgba(0,0,0,0.6);
    color: #6cf065;
    opacity: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 10px;
    transition: opacity 0.3s;
}

.pamflet-card:hover .overlay {
    opacity: 1;
}


.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.6);
    color: #fff;
    opacity: 0;
    display: flex;
    flex-direction: column;
    justify-content: center; /* vertikal center */
    align-items: center;     /* horizontal center */
    text-align: center;
    padding: 10px;
    transition: opacity 0.3s;
}

.overlay-title {
    font-size: 1rem;   /* sesuaikan dengan card kecil */
    font-weight: 700;
    margin-bottom: 5px;
    color: #fff;
}

.overlay-date {
    font-size: 0.85rem;
    font-weight: 500;
    color: #fff;
}

/* Label Aktif / Expired */
.pamflet-label {
    position: absolute;
    top: 8px;
    left: 8px;
    background-color: #2d7a2f;
    color: #fff;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 2px 6px;
    border-radius: 4px;
    z-index: 2;
    text-transform: uppercase;
}

.expired-label {
    background-color: #888;
}

.expired .pamflet-img-wrapper img {
    filter: grayscale(100%);
    opacity: 0.7;
}

.expired .overlay-title,
.expired .overlay-date {
    color: #ddd;
}
</style>




    
    

    





    <!-- Footer -->
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
</body>
</html>
