<!DOCTYPE html>
<html lang="en">
    
<style>
    .logo-img {
    width: 120px;      /* default */
    height: auto;
    object-fit: contain;
}

/* responsive */
@media (min-width: 768px) { /* md */
    .logo-img {
        width: 160px;
    }
}

@media (min-width: 1024px) { /* lg */
    .logo-img {
        width: 180px;
    }
}
</style>

<x-head/>

<body @php echo (isset($bodyClass) ? 'class="' . $bodyClass .'"': '');@endphp>

    <!-- tpm-header-area start -->
    <!-- tpm-header-area start -->
    <header class="tmp-header-area-start header-two header-four header--sticky">
        <!-- header-top start -->
        <div class="header-top-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-top-inner">
                            <div class="left-information-area">
                                <p class="left-top">0807-100-1500</p>
                                <div class="location-area">
                                    <i class="fa-light fa-location-dot"></i>
                                    <a href="#">Bogor, Indonesia</a>
                                </div>
                                <div class="working-time">
                                    <i class="fa-light fa-clock"></i>
                                    <p>Jam Kerja: 8:00 AM – 15:00 PM</p>
                                </div>
                            </div>
                            <div class="right-header-top">
                                <div class="social-area-transparent">
                                    <span>Follow on</span>
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .header-top-one {
                font-size: 0.85rem; /* perkecil teks utama */
            }
            
            .header-top-one .left-top {
                font-size: 0.9rem; /* nomor telepon sedikit lebih besar */
                font-weight: 500;
            }
            
            .header-top-one .location-area,
            .header-top-one .working-time {
                font-size: 1.3rem; /* teks lokasi dan jam kerja lebih kecil */
            }
            
            .header-top-one .right-header-top .social-area-transparent {
                font-size: 1.2rem; /* teks "Follow on" */
            }
            
            .header-top-one .right-header-top .social-area-transparent a i {
                font-size: 1.2rem; /* ikon sosial media sedikit lebih kecil */
            }
            </style>
        <!-- header-top end -->
        <!-- header mid area start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-mida-area style-two ">
                        <div class="logo-area-start flex items-center">
                            <a href="/">
                                <img src="{{ asset('assets/images/logo/logo-03-2.png') }}" alt="logo" class="logo-img">
                            </a>
                            
                        </div>
                        

                        <div class="header-nav main-nav-one">
                            <x-menuList/>
                        </div>
                        <!-- <a href="#" class="tmp-btn btn-primary">Get Consulting</a> -->
                        <div class="actions-area">

                            <a href="/kontak" class="tmp-btn btn-primary">Hubungi Kami</a>

                            
                            <!-- <div class="menu-button" id="search">
                        <i class="fa-light fa-grid-2"></i>
                        </div> -->
                            <div class="tmp-side-collups-area" id="side-collups">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="14" width="20" height="2" fill="#fff"></rect>
                                    <rect y="7" width="20" height="2" fill="#fff"></rect>
                                    <rect width="20" height="2" fill="#fff"></rect>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header mid area end -->

    </header>
    <!-- tpm-header-area end -->

    <x-sidebar/>
    <!-- tpm-header-area end -->

     <!-- Start Breadcrumb area  -->
     {{-- <div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">nothing</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">do not </li>
                        </ul>
                        <div class="circle-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Breadcrumb area  -->
    <!-- End Breadcrumb area  -->

    @yield('content')

    {{-- <x-footer1/> --}}

    <div id="overlay_every-where" data-tmp-cursor="md text-black dark:text-white opacity-10" data-tmp-cursor-icon="fa-regular fa-x fa-fw"></div>

    <x-loader/>

   <x-scripts/>

   @yield('scripts')

   <script>
    function openModal(src) {
    document.getElementById('modal-img').src = src;
    document.getElementById('modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Disable scroll saat modal terbuka
    }
    
    function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    }
    </script>
</body>

</html>