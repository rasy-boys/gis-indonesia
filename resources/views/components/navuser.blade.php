
<header class="bg-green-700 text-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold">GIS Indonesia</h1>
  
      <!-- NAVIGATION -->
      <nav class="hidden md:flex space-x-6 text-sm">

        <a href="/" class="hover:underline">Beranda</a>
      
        <!-- DROPDOWN: Profil -->
        <div class="relative inline-block">
          <button onclick="toggleDropdown('dropdown-profil')" class="flex items-center space-x-1 hover:underline">
            <span>Profil</span>
            <svg class="w-4 h-4 transition-transform duration-200" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="dropdown-profil" class="dropdown-menu hidden absolute left-0 mt-2 w-52 bg-white text-gray-800 shadow-lg rounded-md border z-50">
            <a href="/profil/latar-belakang" class="block px-4 py-2 hover:bg-green-100">Latar Belakang</a>
            <a href="/profil/visi-misi" class="block px-4 py-2 hover:bg-green-100">Visi & Misi</a>
            <a href="/profil/struktur" class="block px-4 py-2 hover:bg-green-100">Struktur Organisasi</a>
          </div>
        </div>
      
        <a href="/aktivitas" class="hover:underline">Aktivitas</a>
      
        <!-- DROPDOWN: Info -->
        <div class="relative inline-block">
          <button onclick="toggleDropdown('dropdown-info')" class="flex items-center space-x-1 hover:underline">
            <span>Info</span>
            <svg class="w-4 h-4 transition-transform duration-200" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="dropdown-info" class="dropdown-menu hidden absolute left-0 mt-2 w-56 bg-white text-gray-800 shadow-lg rounded-md border z-50">
            <a href="/info/berita" class="block px-4 py-2 hover:bg-green-100">Berita</a>
            <a href="/info/pelatihan_dan_perdampingan" class="block px-4 py-2 hover:bg-green-100">Pelatihan & Pendampingan</a>
            <a href="/info/seminar" class="block px-4 py-2 hover:bg-green-100">Seminar</a>
            <a href="/info/kerjasama" class="block px-4 py-2 hover:bg-green-100">Kerjasama</a>
            <a href="/info/pelatihan_dan_advokasi" class="block px-4 py-2 hover:bg-green-100">Pelatihan & Advokasi</a>
            <a href="/info/faq" class="block px-4 py-2 hover:bg-green-100">FAQ</a>
          </div>
        </div>
      
        <!-- DROPDOWN: Galeri -->
        <div class="relative inline-block">
          <button onclick="toggleDropdown('dropdown-galeri')" class="flex items-center space-x-1 hover:underline">
            <span>Galeri</span>
            <svg class="w-4 h-4 transition-transform duration-200" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="dropdown-galeri" class="dropdown-menu hidden absolute left-0 mt-2 w-48 bg-white text-gray-800 shadow-lg rounded-md border z-50">
            <a href="/galeri/foto" class="block px-4 py-2 hover:bg-green-100">Foto</a>
          </div>
        </div>
      
        <!-- DROPDOWN: Publikasi -->
        <div class="relative inline-block">
          <button onclick="toggleDropdown('dropdown-publikasi')" class="flex items-center space-x-1 hover:underline">
            <span>Publikasi</span>
            <svg class="w-4 h-4 transition-transform duration-200" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="dropdown-publikasi" class="dropdown-menu hidden absolute left-0 mt-2 w-56 bg-white text-gray-800 shadow-lg rounded-md border z-50">
            <a href="/publikasi/peraturan" class="block px-4 py-2 hover:bg-green-100">Peraturan</a>
            <a href="/publikasi/jurnal" class="block px-4 py-2 hover:bg-green-100">Jurnal</a>
            <a href="/publikasi/hasilpenelitian" class="block px-4 py-2 hover:bg-green-100">Hasil Penelitian</a>
        
          </div>
        </div>
      
        <a href="/kontak" class="hover:underline">Kontak</a>
      </nav>
      
  
      <!-- HAMBURGER UNTUK MOBILE -->
      <div class="md:hidden">
        <!-- Bisa tambahkan toggle JS kecil jika perlu -->
        <i class="fas fa-bars text-2xl cursor-pointer"></i>
      </div>
    </div>
  </header>





<script>
    function toggleDropdown(id) {
      // Tutup semua dropdown lainnya
      document.querySelectorAll('.dropdown-menu').forEach(menu => {
        if (menu.id !== id) menu.classList.add('hidden');
      });
  
      // Toggle dropdown aktif
      const target = document.getElementById(id);
      target.classList.toggle('hidden');
    }
  
    // Tutup semua dropdown jika klik di luar
    window.addEventListener('click', function (e) {
      document.querySelectorAll('.dropdown-menu').forEach(menu => {
        if (!menu.contains(e.target) && !menu.previousElementSibling.contains(e.target)) {
          menu.classList.add('hidden');
        }
      });
    });
  </script>