<!DOCTYPE html>
<html lang="en">

<x-head/>
<style>

.logo {
  width: 120px;
  height: auto;
  object-fit: contain;
}

/* Medium screen (min-width 768px) */
@media (min-width: 768px) {
  .logo {
    width: 160px;
  }
}

/* Large screen (min-width 1024px) */
@media (min-width: 1024px) {
  .logo {
    width: 180px;
  }
}

body {
    background-color: #f3f4f6; /* ini kode Tailwind bg-gray-100 */
}


    </style>

<body @php echo (isset($bodyClass) ? 'class="' . $bodyClass .'"': '');@endphp>

    <!-- tpm-header-area start -->
    <!-- tpm-header-area start -->
    <header class="tmp-header-area-start header-two header-four header--sticky">
       
       

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-mida-area style-two ">
                        <div class="logo-area-start flex items-center">
                            <a href="/">
                                <img src="{{ asset('assets/images/logo/logo-03-2.png') }}" alt="logo" class="logo" />


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

    </header>
    <!-- tpm-header-area end -->

    
    <!-- tpm-header-area end -->

     <!-- Start Breadcrumb area  -->
     {{-- <div class="breadcrumb-area bg_image tmp-section-gap breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">/</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">/</li>
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

</body>

</html>