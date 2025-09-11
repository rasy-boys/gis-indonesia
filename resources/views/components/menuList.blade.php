<nav class="main-nav">
    <ul class="parent-nav">
        <!-- HOME -->
        <li>
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                <i class="fas fa-home"></i> HOME
            </a>
        </li>

        <!-- Tentang Kami -->
        <li class="has-dropdown">
            <a class="nav-link {{ isActive(['profil/*','team']) }}">
                <i class="fas fa-users"></i> TENTANG KAMI
            </a>
            
           <div class="submenu mega-menu">
    <!-- Kolom 1 -->
    <div class="submenu-left">
        <!-- Judul kolom -->
        <h4 class="submenu-title" style="margin-bottom: 13.1px; padding-left: 0;">
            Profil Perusahaan
        </h4>
        
        <!-- Item submenu -->
        <a href="/profil/latar-belakang" class="submenu-item">
            <i class="fas fa-id-card"></i>
            <div class="text">
                <span class="title">Profil</span>
                <span class="desc">Latar belakang perusahaan</span>
            </div>
        </a>
    
        <!-- Card di bawah item -->
        <div class="submenu-card" style="margin-left: 10px; margin-bottom: 26px;">
            GIS Indonesia menyediakan data geospasial akurat untuk mendukung keputusan strategis.
        </div>
    </div>
    
    

    <div class="submenu-left">
        <h4 class="submenu-title">Visi & Misi</h4>
        
        <a href="/profil/visi-misi" class="submenu-item">
            <i class="fas fa-bullseye"></i>
            <div class="text">
                <span class="title">Visi & Misi</span>
                <span class="desc">Arah dan tujuan perusahaan</span>
            </div>
        </a>
    
        <!-- Card di luar submenu-item -->
        <div class="submenu-card" style="margin-left: 10px; margin-bottom: 26px;">
            GIS Indonesia berkomitmen menyediakan data geospasial akurat untuk mendukung keputusan strategis.
        </div>
        
    </div>
    
    
    <div class="submenu-left">
        <h4 class="submenu-title">Tim & Profesional Kami</h4>
        <a href="/team" class="submenu-item">
            <i class="fas fa-user-friends"></i>
            <div class="text">
                <span class="title">Tim Kami</span>
                <span class="desc">Orang-orang hebat di balik layar</span>
            </div>
        </a>
    
        <div class="submenu-card" style="margin-left: 10px; margin-bottom: 26px;">
            Tim kami adalah profesional berdedikasi yang memastikan setiap proyek berjalan optimal.
        </div>
        
    </div>
    


    <!-- Kolom kanan: gambar -->
    <div class="submenu-right">
        <div class="illustration">
            <a href="/profil/latar-belakang" class="visit-link">Profil Kami</a>
        </div>
    </div>
</div>

        </li>
        

        <!-- Info -->
        <li class="has-dropdown">
            <a class="nav-link {{ isActive(['info/*']) }}">
                <i class="fas fa-info"></i> INFO
            </a>
            
           <div class="submenu mega-menu">

  

<!-- Kolom 1 -->
<div class="submenu-left">
    <h4 class="submenu-title" style="margin-bottom: 13.1px; padding-left: 0;">
        layanan & Berita
    </h4>
    <a href="/info/berita" class="submenu-item">
        <i class="fas fa-newspaper"></i>
        <div class="text">
            <span class="title">Berita</span>
            <span class="desc">Update terbaru mengenai perusahaan</span>
        </div>
    </a>

       <!-- Card di luar submenu-item -->
       <!-- Card di luar submenu-item -->
       <div class="submenu-card" style="margin-left: 10px; margin-bottom: 26px;">
        GIS Indonesia berkomitmen menyediakan data geospasial akurat untuk mendukung keputusan strategis.
    </div>
    


    <a href="/info/pelatihan_dan_perdampingan" class="submenu-item">
        <i class="fas fa-chalkboard-teacher"></i>
        <div class="text">
            <span class="title">Pelatihan</span>
            <span class="desc">Program pelatihan dan pendampingan</span>
        </div>
    </a>

       <!-- Card di luar submenu-item -->
       <div class="submenu-card" style="margin-left: 10px; margin-bottom: 26px;">
        GIS Indonesia berkomitmen menyediakan data geospasial akurat untuk mendukung keputusan strategis.
    </div>
</div>



       <!-- Kolom 2 -->
       <div class="submenu-left">
        <h4 class="submenu-title">Layanan</h4>
        <a href="/info/kerjasama" class="submenu-item">
            <i class="fas fa-handshake"></i>
            <div class="text">
                <span class="title">Kerjasama</span>
                <span class="desc">Kolaborasi dengan mitra strategis</span>
            </div>
        </a>
    
           <!-- Card di luar submenu-item -->
           <div class="submenu-card" style="margin-left: 10px; margin-bottom: 26px;">
            GIS Indonesia berkomitmen menyediakan data geospasial akurat untuk mendukung keputusan strategis.
        </div>

        <a href="/info/faq" class="submenu-item">
            <i class="fas fa-question-circle"></i>
            <div class="text">
                <span class="title">FAQ</span>
                <span class="desc">Pertanyaan umum dan jawabannya</span>
            </div>
        </a>

           <!-- Card di luar submenu-item -->
           <div class="submenu-card" style="margin-left: 10px; margin-bottom: 26px;">
            GIS Indonesia berkomitmen menyediakan data geospasial akurat untuk mendukung keputusan strategis.
        </div>
    </div>
    

    <!-- Kolom 3 -->
    <div class="submenu-left">
        <h4 class="submenu-title">Kontak</h4>
        <a href="/kontak" class="submenu-item">
            <i class="fas fa-envelope"></i>
            <div class="text">
                <span class="title">Hubungi Kami</span>
                <span class="desc">Kirim pesan atau ajukan pertanyaan</span>
            </div>
        </a>
           <!-- Card di luar submenu-item -->
           <div class="submenu-card" style="margin-left: 10px; margin-bottom: 26px;">
            GIS Indonesia berkomitmen menyediakan data geospasial akurat untuk mendukung keputusan strategis.
        </div>
    </div>
    
    


    <!-- Kolom kanan: gambar -->
    <div class="submenu-right">
        <div class="illustration2">
            <a href="/info/berita" class="visit-link">Berita Terbaru</a>
        </div>

        
    </div>
</div>

        </li>
        

        <!-- Galeri -->
        <li>
            <a class="nav-link {{ Request::is('galeri/*') ? 'active' : '' }}" href="/galeri/foto">
                <i class="fas fa-images"></i> GALERI
            </a>
    </ul>
</nav>


<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<style>
    .gallery-item {
    position: relative;
    display: block;
    width: 180px;      /* bisa kamu sesuaikan */
    height: 150px;     /* bisa kamu sesuaikan */
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
}


/* .submenu-left:not(:last-child)::after {
  content: "";
  position: absolute;
  top: 37px;                  
  right: 0;
  width: 2px;
  height: calc(100% - 37px);  
  background: #27d935;
}


.submenu-left:nth-child(3)::after {
  display: none;
} */


.submenu-item:hover .submenu-card {
    background: #f0fff0; /* efek hover lebih fresh */
    border-left-color: #22bb2f;
}



.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
}

.gallery-item .overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.5);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 600;
    opacity: 0;
    transition: opacity 0.3s ease;
}

/* Hover effect */
.gallery-item:hover img {
    transform: scale(1.08);
}
.gallery-item:hover .overlay {
    opacity: 1;
}

    </style>
<style>
/* ===== NAVBAR UTAMA ===== */
/* ===== NAVBAR UTAMA ===== */
.main-nav {
    padding: 0 40px !important; /* tipis vertikal */
    font-family: 'Segoe UI', sans-serif;
}

.parent-nav {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 30px;
}
.parent-nav li {
    position: relative;
}
.nav-link {
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    color: #222;
    padding: 8px 12px;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: 0.3s;
}
.nav-link:hover {
    color: #45cf22;
}

.nav-link.active {
    color: #45cf22 !important;
}


/* ===== MEGA MENU CONTAINER ===== */
.submenu.mega-menu {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) auto; /* 3 kolom kiri + 1 kanan */
  column-gap: 5px !important;   /* hanya horizontal */
row-gap: 15px !important;     /* misal tetap 15px antar baris */
    position: fixed !important;
    top: 88px !important;
    left: 0 !important;
    width: 100% !important;
    background: #fff;
    padding: 30px 40px;
    border-radius: 0;
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    z-index: 999;
    display: none;
}

/* tampilkan saat hover */
.has-dropdown:hover .submenu.mega-menu {
    display: grid; /* grid tetap dipakai */
}

/* ===== KIRI ===== */
.submenu-left {
    position: relative; /* penting supaya ::after ikut parent */
    display: flex !important;
    flex-direction: column !important;
    padding-right: 20px !important; /* jarak isi ke garis */
}
.submenu-card {
    position: relative;       
    margin-top: 8px;          
    background: #ffffff;              /* putih bersih */
    border-left: 4px solid #27d935;   /* aksen hijau lebih tegas */
    padding: 10px 14px;              
    border-radius: 10px;              /* radius lebih halus */
    font-size: 13px;                  
    color: #2c2c2c;                   /* teks lebih gelap tapi lembut */
    line-height: 1.4;                 
    box-shadow: 0 4px 12px rgba(0,0,0,0.08); /* bayangan lebih modern */
    width: 100%;
    max-width: 240px;                 
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

/* efek hover modern */
.submenu-card:hover {
    transform: translateY(-3px);               /* sedikit “angkat” */
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);  /* bayangan lebih nyata */
}


/* ===== ITEM SUBMENU ===== */
/* Judul kolom */
.submenu-title {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #1c1919;
    padding-left: 0;      /* hapus padding ekstra supaya sejajar */
}

/* Item submenu menonjol tanpa card */
.submenu-item {
    display: flex;
    align-items: flex-start; 
    gap: 14px;                  /* sedikit lebih renggang */
    padding: 14px 16px;          /* lebih besar supaya terasa “besar” */
    border-radius: 12px;         /* sudut lebih halus */
    text-decoration: none;
    color: #333;
     
    transition: all 0.3s ease;
}

/* Icon */
.submenu-item i {
    font-size: 22px;             /* icon lebih besar */
    color: #27d935;
    flex-shrink: 0;
    margin-top: 0;
}

/* Teks di item */
.submenu-item .text {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    line-height: 1.4;
}
.submenu-item .title {
    font-weight: 600;
    font-size: 15px;            /* teks lebih besar */
}
.submenu-item .desc {
    font-size: 12px;
    color: #555;                /* warna teks lebih gelap */
}

/* Hover efek */
.submenu-item:hover {
    background: #e6ffe6;        /* hijau lebih terang saat hover */
    color: #1a7f1a;
    transform: translateY(-2px); /* sedikit terangkat */
    box-shadow: 0 6px 16px rgba(0,0,0,0.12); /* efek melayang halus */
}


/* ===== KANAN - DUA GAMBAR ===== */
.submenu-right {
    display: flex;
    align-items: flex-start;   /* sejajar atas */
    justify-content: flex-start; /* wrapper di kiri */
    width: auto; /* jangan stretch */
}

.illustration-wrapper {
    display: flex;
    gap: 20px; /* jarak antar gambar */
    width: 100%; /* fleksibel sesuai wrapper */
}

.illustration-wrapper .illustration:last-child {
    margin-left: auto; /* gambar kedua menempel ke kanan jika ada */
}

/* Gambar utama */
.submenu-right .illustration {
    width: 300px;
    height: 200px;
    flex-shrink: 0;
    background-size: cover;
    background-position: center;
    border-radius: 15px;
    overflow: hidden;
    position: relative;
}

.submenu-right .illustration2 {
    width: 350px;
    height: 250px;
    flex-shrink: 0;
    background-size: cover;
    background-position: center;
    border-radius: 15px;
    overflow: hidden;
    position: relative;
    margin-left: 0px !important; /* geser ke kanan 20px */
}

/* Gambar spesifik */
.submenu-right .illustration {
    background-image: url('/image/gis.png');
}
.submenu-right .illustration2 {
    background-image: url('/images/news.png');
    margin-top: 0px !important;
}

/* overlay link di gambar */
.visit-link {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    text-align: center;
    background: rgba(0,0,0,0.6);
    color: #fff;
    padding: 10px 0;
    font-size: 14px;
    text-decoration: none;
    transition: background 0.3s ease;
}
.visit-link:hover {
    background: rgba(0,0,0,0.8);
}

/* ===== ANIMASI GRADIENT (jika ada) ===== */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
    .submenu.mega-menu {
        grid-template-columns: 1fr; /* stack kiri-kanan */
        padding: 15px;
    }
    .submenu-right {
        justify-content: flex-start;
        margin-top: 20px;
    }
    .illustration-wrapper {
        flex-direction: column;
        gap: 15px;
    }
}

</style>
