<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<style>

.contact-inner .ft-link.ft-link-style-three li .single-contact .icon {
    background-image: none !important;
}
.single-contact .icon {
    background-image: none !important;
    background-color: #16a34a !important; /* hijau */
}


</style>
<style>
    body {
        background-color: #ffffff !important;
    }
    </style>
    @extends('layouts.layout')
    
   
    
    
    @section('content')

    <div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg"
        style="background-image: url('{{ asset('assets/images/banner/kontak.png') }}'); background-size: cover; background-position: center;">
     

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h1 class="title split-collab">Kontak</h1>
                    <ul class="page-list">
                        <li class="tmp-breadcrumb-item"><a href="/">Beranda</a></li>
                        <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                        <li class="tmp-breadcrumb-item active">Kontak</li>
                    </ul>
                    <div class="circle-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>
  

<div class="contact-area tmp-section-gap">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="contact-inner">
                    <div class="section-head section-head-one-side text-align-left">
                        <span class="title">Kontak Kami</span>
                        <p class="description">
                            Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau butuh informasi lebih lanjut.
                        </p>
                    </div>

                    <ul class="ft-link ft-link-style-three">
                        <li>
                            <div class="single-contact background-transparent">
                                <div class="icon text-green-500">
                                    <i class="fa-light fa-phone"></i>
                                </div>
                                <div class="content">
                                    <span>Nomor Kami</span>
                                    <a class="contact-here" href="tel:+628111919711">  +62 811-1919-711 </a>
                                </div>
                            </div>
                        </li>
                        


                        <li>
                            <div class="single-contact background-transparent">
                                <div class="icon">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                </div>

                                <div class="content">
                                    <span>E-mail</span>
                                    <a class="contact-here" href="mailto:webmaster@example.com">info@gis.id</a>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-7">
                <div class="contact-inner">
                    <div class="section-head section-head-one-side text-align-left">
                        <span class="title">Tinggalkan Pesan Untuk Kami</span>
                        <p class="description">
                          Jangan sungkan untuk mengirim pesan kepada kami
                        </p>
                    </div>
            
                    <div class="contact-form style-two">
                        {{-- Pesan notifikasi --}}
                        @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded border border-green-300">
                            {{ session('success') }}
                        </div>
                        @endif
            
                        @if(session('error'))
                        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded border border-red-300">
                            {{ session('error') }}
                        </div>
                        @endif
            
                        @if($errors->any())
                        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded border border-red-300">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
            
                        {{-- Form Kontak --}}
                        <form action="{{ route('contact.send') }}" method="POST" class="max-w-5xl ml-4">
                            @csrf
            
                            <div class="contact-form-wrapper row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="input-field" name="name" placeholder="Nama" id="contact-name" type="text" required>
                                    </div>
                                </div>
            
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="input-field" name="email" placeholder="Email" type="email" required>
                                    </div>
                                </div>
            
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="input-field" type="text" id="subject" placeholder="Subject" name="subject">
                                    </div>
                                </div>
            
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="input-field" placeholder="Pesan Anda" name="message" id="contact-message"></textarea>
                                    </div>
                                </div>
            
                                {{-- CAPTCHA --}}
                                <div class="col-lg-12 mb-4">
                                    {{-- <label for="captcha" class="block text-sm font-medium text-green-700 mb-1">Kode Captcha</label> --}}
                                    
                                    <div class="flex items-center gap-3 mb-2">
                                        <!-- Gambar captcha diperbesar -->
                                        <img src="{{ captcha_src() }}" id="captcha-img" class="h-16 md:h-20 rounded border border-green-300">
                                        
                                        <!-- Tombol refresh -->
                                        <button type="button"
                                                class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition"
                                                onclick="document.getElementById('captcha-img').src='{{ url('captcha') }}?t=' + Date.now()">
                                            ⟳
                                        </button>
                                    </div>
                                
                                    <input type="text" name="captcha" id="captcha"
                                           class="w-full px-4 py-2 border border-green-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 text-sm"
                                           placeholder="Masukkan kode di atas" required>
                                    
                                    @error('captcha')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                
            
                            </div>
            
                            <button
                            type="submit"
                            class="w-full min-w-[200px] text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded transition duration-300 shadow"
                            >
                                Kirim
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>



    <!-- Konten -->
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
