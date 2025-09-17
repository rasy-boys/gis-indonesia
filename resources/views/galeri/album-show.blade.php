{{-- resources/views/galeri/album-show.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri Foto | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png?v=1') }}">

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

   


.section-head {
    text-align: center;
    padding-bottom: 12px !important;
}


</style>
@extends('layouts.layout')

@php
    $title = $album->nama;
    $subtitle = 'Album';
@endphp

@section('content')
<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg mb-7"
    style="background-image: url('{{ asset('assets/images/banner/galeri1.jpg') }}'); background-size: cover; background-position: center;">
   
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title split-collab">{{ $album->nama }}</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                        <li class="tmp-breadcrumb-item"><a href="{{ route('galeri.foto') }}">Foto & Video</a></li>
                        <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                        <li class="tmp-breadcrumb-item active">{{ $album->nama }}</li>
                    </ul>
                    <div class="circle-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>


     

        <!-- Grid Galeri -->
        <div class="container my-5 py-5">

            <!-- Judul Album & Tahun -->
            <div class="text-center mb-5">
                <div class="section-sub-title mb-3">
                    <span class="fs-4 fw-semibold text-success shadow-sm px-3 py-1 rounded-pill bg-white">
                        Foto & Video {{ $album->tahun }}
                    </span>
                </div>
                <h2 class="album-title display-3 fw-bold text-success text-shadow-lg">
                    Mari Lihat Album {{ $album->nama }}
                </h2>
            </div>
            
            <!-- Tombol Filter -->
            <div class="text-center mb-5">
                <button class="btn btn-success btn-lg me-3 filter-btn active shadow-lg filter-hover" data-filter="all">Semua</button>
                <button class="btn btn-success btn-lg me-3 filter-btn shadow-lg filter-hover" data-filter="foto">Foto</button>
                <button class="btn btn-success btn-lg filter-btn shadow-lg filter-hover" data-filter="video">Video</button>
            </div>
            
            <style>
            .album-title.text-shadow-lg {
                text-shadow: 2px 2px 10px rgba(0,0,0,0.25); /* bayangan dramatis */
            }
            
            .filter-hover {
                transition: transform 0.3s, box-shadow 0.3s;
            }
            
            .filter-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            }
            </style>
            
        
            <!-- Galeri Grid -->
            <div class="row g-4">
                @forelse ($album->galeriFotos as $galeri)
                    @php
                        $type = $galeri->kategori_id == 1 ? 'foto' : 'video';
                        if($type == 'video' && $galeri->video_link){
                            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/shorts\/)([^\&\?\/]+)/', $galeri->video_link, $matches);
                            $youtubeId = $matches[1] ?? null;
                        }
                    @endphp
        
        <div class="{{ $type == 'foto' ? 'col-6 col-md-3' : 'col-12 col-md-6' }} galeri-item" data-type="{{ $type }}">
            <div class="card h-100 shadow-sm">
        
                {{-- Foto --}}
                @if($type == 'foto' && $galeri->foto)
                    <div class="ratio ratio-1x1 bg-light">
                        <img src="{{ asset('storage/' . $galeri->foto) }}" 
                             class="img-fluid" 
                             alt="{{ $galeri->deskripsi }}" 
                             style="object-fit: contain; padding: 10px; cursor:pointer;"
                             onclick="openModal(this.src)">
                    </div>
        
                {{-- Video --}}
                @elseif($type == 'video')
                    @if($youtubeId)
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}" 
                                    title="Video" allowfullscreen></iframe>
                        </div>
                    @else
                        <div class="d-flex justify-content-center align-items-center" style="height:200px; background:#f0f0f0;">
                            <i class="fa-solid fa-video fa-2x"></i>
                            <span class="ms-2">Video</span>
                        </div>
                    @endif
                @endif
        
                {{-- Info --}}
                <div class="card-body text-center">
                    <p class="card-text mb-1">{{ $galeri->deskripsi }}</p>
                    {{-- <small class="text-muted">{{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d M Y') }}</small> --}}
                </div>
            </div>
        </div>
        
        
                @empty
                    <p class="text-center">Belum ada foto atau video di album ini.</p>
                @endforelse
            </div>
        </div>
        
        <!-- Modal Foto -->
        <div id="modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-body p-0 bg-white rounded shadow">
                        <img id="modal-img" src="" class="img-fluid rounded" alt="Preview">
                    </div>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
        
        
        <!-- Script Filter & Modal -->
        <script>
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function(){
                const filter = this.dataset.filter;
        
                // Aktifkan tombol
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
        
                // Tampilkan / sembunyikan item
                document.querySelectorAll('.galeri-item').forEach(item => {
                    if(filter === 'all' || item.dataset.type === filter){
                        item.classList.remove('d-none');
                    } else {
                        item.classList.add('d-none');
                    }
                });
            });
        });
        
        // Modal foto
        function openModal(src){
            const modalImg = document.getElementById('modal-img');
            modalImg.src = src;
            const modal = new bootstrap.Modal(document.getElementById('modal'));
            modal.show();
        }
        </script>
        



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
                    <h5 class="ft-title">Quick Link</h5>
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
                    <h5 class="ft-title">Recent Post</h5>
            
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


    
    
    
@endsection
