<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>FAQ | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 

</head>

   
<style>
.thumbnail {
  width: 64px;
  height: 64px;
  overflow: hidden;
  border-radius: 8px;
}

.recent-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

    </style>



@extends('layouts.layout')



@section('content')

<div class="bg-gray-100 min-h-screen">

<div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg mb-7"
style="background-image: url('{{ asset('assets/images/banner/faq.png') }}'); background-size: cover; background-position: center;">
<div class="absolute inset-0 bg-black/50 z-0"></div>
<div class="container relative z-0">

    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-inner text-center">
                <h1 class="title split-collab">FAQ</h1>
                <ul class="page-list">
                    <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                    <li class="tmp-breadcrumb-item active">Faq</li>
                </ul>
                <div class="circle-1"></div>
            </div>
        </div>
    </div>
</div>
</div>


<div class="tmp-section-gap tmpfaqs-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-accordion">
                      
                            
                        <div class="accordion" id="accordionExample">
                            @foreach($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button collapsed flex justify-between items-center" 
                                            type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#collapse{{ $index }}" 
                                            aria-expanded="false" 
                                            aria-controls="collapse{{ $index }}">
                                        <span><i class="fa-regular fa-question mr-2"></i> {{ $faq->question }}</span>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse" 
                                     aria-labelledby="heading{{ $index }}" 
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                                
                            
                     

                        <div class="faq-buttom">
                            <h4 class="title">Masih Punya Pertanyaan, Kontak Kami ya?
                            </h4>
                            <p><a href="/kontak">Kontak Kami</a></p>
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
                    <h5 class="ft-title"> Postingan Terbaru</h5>
            
                    @foreach ($recentPosts as $recent)
                    <div class="single-post flex items-start gap-3 mb-4">
                        <div class="thumbnail">
                            <a href="{{ route('info.berita.detail', $recent->slug) }}">
                              <img src="{{ asset('storage/' . $recent->gambar) }}" alt="{{ $recent->judul }}" class="recent-image">
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

</body>
</html>
  