<header class="bg-green-700 text-white p-4 shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold"><i class="fas fa-user-shield mr-2"></i>Dashboard Admin</h1>
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="hover:underline">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</header>

<!-- LAYOUT FLEX -->
<div class="flex">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r min-h-screen p-4 shadow-md">
        <h2 class="text-2xl font-bold text-green-700 mb-6">Dashboard Admin</h2>

        <!-- Menu Utama -->
        <nav class="space-y-2">
            <!-- Menu Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-2 rounded-md hover:bg-green-50 text-gray-800 font-semibold transition">
                <i class="fas fa-tachometer-alt mr-2 text-green-600"></i>
                Dashboard
                </a>

            <!-- Dropdown Beranda -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-2 rounded-md hover:bg-green-50 text-left text-gray-800 font-semibold transition">
                    
                    <!-- Kiri: Ikon + Teks -->
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-home text-green-600"></i>
                        <span>Beranda</span>
                    </div>
            
                    <!-- Kanan: Panah -->
                    <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            
                <!-- Submenu -->
                <div x-show="open" x-transition class="mt-1 pl-4 space-y-1">
                    <a href="{{ route('admin.home.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-green-100">
                        Edit Judul & Gambar
                    </a>
                    <a href="{{ route('admin.ruang-lingkup.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-green-100">
                        Kelola Ruang Lingkup
                    </a>
                </div>
            </div>

            <!-- Dropdown Beranda -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-2 rounded-md hover:bg-green-50 text-left text-gray-800 font-semibold transition">
                    
                    <!-- Kiri: Ikon + Teks -->
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user text-green-600"></i>
                        <span>Profil</span>
                    </div>
            
                    <!-- Kanan: Panah -->
                    <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            
                <!-- Submenu -->
                <div x-show="open" x-transition class="mt-1 pl-4 space-y-1">
                    <a href="{{ route('admin.latar-belakang.edit') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-green-100">
                        Edit Latar Belakang
                    </a>
                
                </div>

                <div x-data="{ open: false }">
                    <button @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-2 rounded-md hover:bg-green-50 text-left text-gray-800 font-semibold transition">
                        
                        <!-- Kiri: Ikon + Teks -->
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-newspaper text-green-600"></i>
                            <span>Info</span>
                        </div>
                
                        <!-- Kanan: Panah -->
                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                
                    <!-- Submenu -->
                    <div x-show="open" x-transition class="mt-1 pl-4 space-y-1">
    
                        <a href="{{ route('admin.berita.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-green-100">
                            Kelola Berita
                        </a>
                    </div>

                    <div x-show="open" x-transition class="mt-1 pl-4 space-y-1">
    
                        <a href="{{ route('admin.pamflets.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-green-100">
                            Kelola Pelatihan
                        </a>
                    </div>

                <div x-data="{ open: false }">
                    <button @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-2 rounded-md hover:bg-green-50 text-left text-gray-800 font-semibold transition">
                        
                        <!-- Kiri: Ikon + Teks -->
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-image text-green-600"></i>
                            <span>Galeri</span>
                        </div>
                
                        <!-- Kanan: Panah -->
                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                
                    <!-- Submenu -->
                    <div x-show="open" x-transition class="mt-1 pl-4 space-y-1">
                        <a href="{{ route('admin.galeri.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-green-100">
                            kelola foto
                        </a>
                      
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open"
                                class="w-full flex items-center justify-between px-4 py-2 rounded-md hover:bg-green-50 text-left text-gray-800 font-semibold transition">
                            
                            <!-- Kiri: Ikon + Teks -->
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-book-journal-whills  text-green-600"></i>
                                <span>Publikasi</span>
                            </div>
                    
                            <!-- Kanan: Panah -->
                            <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transform transition-transform" fill="none"
                                 stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    
                        <!-- Submenu -->
                        <div x-show="open" x-transition class="mt-1 pl-4 space-y-1">
        
                            <a href="{{ route('admin.peraturan.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-green-100">
                                peraturan
                            </a>

                            <a href="{{ route('admin.jurnal.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-green-100">
                                Jurnal
                            </a>
                        </div>

            </div>
            
        </nav>
    </aside>