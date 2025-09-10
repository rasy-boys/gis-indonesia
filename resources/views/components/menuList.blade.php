<nav class="main-nav">
    <ul class="parent-nav">
        <!-- HOME -->
        <li>
            <a class="nav-link" href="/">
                <i class="fas fa-home"></i> HOME
            </a>
        </li>

        <!-- Tentang Kami -->
        <li class="has-dropdown">
            <a class="nav-link" href="#">
                <i class="fas fa-users"></i> TENTANG KAMI
            </a>
            <div class="submenu mega-menu">
                <div class="submenu-left">
                    <h4 class="submenu-title">Tentang Kami</h4>
                    <a href="/profil/latar-belakang" class="submenu-item">
                        <i class="fas fa-id-card"></i>
                        <div class="text">
                            <span class="title">Profil</span>
                            <span class="desc">Latar belakang perusahaan</span>
                        </div>
                    </a>
                    <a href="/profil/visi-misi" class="submenu-item">
                        <i class="fas fa-bullseye"></i>
                        <div class="text">
                            <span class="title">Visi & Misi</span>
                            <span class="desc">Arah dan tujuan kami</span>
                        </div>
                    </a>
                    <a href="/team" class="submenu-item">
                        <i class="fas fa-user-friends"></i>
                        <div class="text">
                            <span class="title">Tim Kami</span>
                            <span class="desc">Orang-orang hebat di balik layar</span>
                        </div>
                    </a>
                </div>
                <div class="submenu-right">
                  
                        <div class="illustration">
                            <a href="/profil/latar-belakang" class="visit-link">Profil Kami</a>
                  
                        </div>
                         
                </div>
                
            </div>
        </li>
        

        <!-- Info -->
        <li class="has-dropdown">
            <a class="nav-link" href="#">
                <i class="fas fa-info-circle"></i> INFO
            </a>
            <div class="submenu mega-menu">
                
                <!-- kolom kiri -->
                <div class="submenu-left">
                    <h4 class="submenu-title">Info</h4>
        
                    <a href="/info/berita" class="submenu-item">
                        <i class="fas fa-newspaper"></i>
                        <div class="text">
                            <span class="title">Berita</span>
                            <span class="desc">Informasi terbaru perusahaan</span>
                        </div>
                    </a>
        
                    <a href="/info/pelatihan_dan_perdampingan" class="submenu-item">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div class="text">
                            <span class="title">Pelatihan</span>
                            <span class="desc">Pamflet kita</span>
                        </div>
                    </a>
        
                    <a href="/info/kerjasama" class="submenu-item">
                        <i class="fas fa-handshake"></i>
                        <div class="text">
                            <span class="title">Kerjasama</span>
                            <span class="desc">Kolaborasi dengan mitra strategis</span>
                        </div>
                    </a>
        
                    <a href="/info/faq" class="submenu-item">
                        <i class="fas fa-question-circle"></i>
                        <div class="text">
                            <span class="title">FAQ</span>
                            <span class="desc">Jawaban atas pertanyaan umum</span>
                        </div>
                    </a>
                </div>
        
                <!-- kolom kanan ilustrasi -->
                <div class="submenu-right">
                   
                    <div class="illustration2">
                        <a href="/info/berita" class="visit-link">Berita Terbaru</a>
                    </div>
                   
                </div>
            </div>
        </li>
        

        <!-- Galeri -->
        <li>
            <a class="nav-link" href="/galeri/foto">
                <i class="fas fa-images"></i> GALERI
            </a>
        </li>
    </ul>
</nav>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

<style>
/* ===== NAVBAR UTAMA ===== */
.main-nav {
   
    padding: 0px 40px !important; /* lebih tipis vertikal */

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

.submenu.mega-menu {
    display: flex !important;
    flex-direction: row !important;
    align-items: stretch !important;   /* ini kuncinya */
    gap: 20px !important;
    position: fixed !important;
    top: 88px !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    min-width: 850px !important;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    z-index: 999;
}

/* kiri */
.submenu-left {
    flex:  !important;
    display: flex !important;
    flex-direction: column !important;
}


/* kanan */
.submenu-right {
    flex: 1 !important;
    display: flex !important;
    justify-content: flex-start !important; /* pastikan isi nempel kiri */
    padding-left: 20px !important;
}

.submenu-right .illustration,
.submenu-right .illustration2 {
    position: relative;
    width: 220px !important;   /* ❗ kasih lebar sendiri */
    height: 200px !important;  /* tinggi fix */
    flex-shrink: 0 !important;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 15px;
    overflow: hidden;
    display: block !important;
}



/* Gambar spesifik */
.submenu-right .illustration {
    background-image: url('/image/gis.png') !important;
}

.submenu-right .illustration2 {
    background-image: url('/images/news.png') !important;
    margin-top: 38px !important;  /* atur jarak ke bawah sesuai kebutuhan */
}

.visit-link {
    position: absolute;
    bottom: 0;                /* tempel di bawah */
    left: 0;
    width: 100%;              /* penuh sepanjang gambar */
    text-align: center;       /* teks di tengah */
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    padding: 10px 0;          /* tinggi bar */
    font-size: 14px;
    text-decoration: none;
    transition: background 0.3s ease;
    border-radius: 0;         /* biar rata dengan gambar */
}

.visit-link:hover {
    background: rgba(0, 0, 0, 0.8);
}






@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}



.has-dropdown:hover .submenu.mega-menu {
    display: flex;
}

/* ===== ITEM SUBMENU ===== */
.submenu-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 10px;
    border-radius: 8px;
    text-decoration: none;
    color: #333;
    transition: 0.25s;
}
.submenu-item i {
    font-size: 20px;
    color: #27d935; /* warna utama */
    margin-top: 2px;
}
.submenu-item .text {
    display: flex;
    flex-direction: column;
    line-height: 1.3;
}
.submenu-item .title {
    font-weight: 600;
    font-size: 14px;
}
.submenu-item .desc {
    font-size: 12px;
    color: #777;
}
.submenu-item:hover {
    background: #f9f9f9;
    color: #6de200;
}
.submenu-title {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #1c1919; /* merah khas Telkom */
    padding-left: 10px;
}




</style>
