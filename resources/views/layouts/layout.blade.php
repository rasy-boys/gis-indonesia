<!DOCTYPE html>
<html lang="en">
    

<x-head/>

<body @php echo (isset($bodyClass) ? 'class="' . $bodyClass .'"': '');@endphp>

    <!-- tpm-header-area start -->

    <header class="tmp-header-area-start header-two header-four header--sticky"id="mainHeader">
        <!-- header mid area start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-mida-area style-two ">
                        <div class="logo-area-start flex items-center">
                            <a href="/">
                                <img src="{{ asset('assets/images/logo/logo-03-2.png') }}" alt="logo"
                                class="w-[100px] md:w-[140px] lg:w-[160px] h-auto object-contain">

                            </a>
                        </div>
                     
                        <div class="header-nav main-nav-one">
                            <x-menuList/>
                        </div>
                 

                     
                        <div class="actions-area">

                            <a href="/kontak" class="tmp-btn btn-primary">Hubungi Kami</a>

                           
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
 

    <style>
 .tmp-header-area-start {
    padding: 0 !important;     /* hilangkan padding */
    margin-top: -10px;         /* geser ke atas, atur nilainya sesuai selera */
}
.header-mida-area {
    display: flex;
    align-items: center;     /* biar logo + nav + button sejajar */
    justify-content: space-between;
    padding: 6px 0;          /* atur tinggi total navbar */
}

.tmp-header-area-start.header-two .header-mida-area.style-two {
    display: flex
;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
}

       
</style>
    <x-sidebar/>
    

    @yield('content')

   

    <div id="overlay_every-where" data-tmp-cursor="md text-black dark:text-white opacity-10" data-tmp-cursor-icon="fa-regular fa-x fa-fw"></div>

    <x-loader/>

   <x-scripts/>

   @yield('scripts')


   <script>
    let lastScrollTop = 0;
    const header = document.getElementById('mainHeader');
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
        if(scrollTop > lastScrollTop){
            // scroll ke bawah → sembunyikan
            header.style.transform = 'translateY(-100%)';
            header.style.transition = 'transform 0.3s ease';
        } else {
            // scroll ke atas → munculkan
            header.style.transform = 'translateY(0)';
            header.style.transition = 'transform 0.3s ease';
        }
    
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // untuk mobile
    });
    </script>


</body>

</html>