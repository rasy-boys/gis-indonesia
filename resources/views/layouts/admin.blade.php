<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Admin Dashboard')</title>
<link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">

<!-- AdminLTE & Font Awesome -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Font Modern -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<!-- Tambahin CSS Quill -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<style>
   body, .nav-link, .content-wrapper {
    font-family: 'Inter', sans-serif;
}

html, body {
    height: 100%;
    margin: 0;
    overflow: hidden; /* stop scroll di body */
}

.wrapper {
    height: 100%;
    overflow: hidden; /* biar wrapper gak scroll */
}

.content-wrapper {
    height: calc(100vh - 120px); /* sisain buat header + footer */
    overflow-y: auto;           /* scroll hanya di bagian content */
    padding: 2rem;
    background-color: #f5f6fa;
}


/* Footer */
.main-footer {
    margin-left: 0 !important; /* biar gak ketiban sidebar */
    width: 100% !important;
    border-radius: 0 !important;
    background: #fff;
    padding: 1rem;
    border-top: 1px solid #ddd;
}

/* Sidebar active menu */
.nav-sidebar .nav-link.active {
    background: linear-gradient(90deg, #28a745, #218838);
    color: #fff !important;
    font-weight: 600;
}
.nav-sidebar .nav-link.active i {
    color: #fff;
}

/* Sidebar hover effect */
.nav-sidebar .nav-link:hover {
    background-color: #218838;
    color: #fff !important;
}

/* Card style for content */
.admin-card {
    background-color: #fff;
    border-radius: 1rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    border: 1px solid #e5e7eb;
    padding: 2rem;
    margin-bottom: 2rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.admin-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* Headings inside card */
.admin-card h1, .admin-card h2 {
    font-weight: 700;
    color: #28a745;
    margin-bottom: 1rem;
    border-bottom: 2px solid #28a74533;
    padding-bottom: 0.5rem;
}

/* Buttons */
.btn-green {
    background-color: #28a745;
    color: #fff;
    font-weight: 600;
    transition: all 0.2s ease-in-out;
}
.btn-green:hover {
    background-color: #218838;
    color: #fff;
}

/* Tinggi navbar */
.main-header.navbar {
    min-height: 60px; /* bisa disesuaikan */
}

/* Spacing atas-bawah link navbar */
.navbar-nav .nav-link {
    padding: 0.75rem 1rem;
}

/* Jika navbar item punya icon + teks */
.navbar-nav .nav-link i {
    margin-right: 0.5rem;
}

.footer-container {
    display: flex;
    align-items: center;   /* biar teks tetap center secara vertical */
    justify-content: flex-end; /* dorong ke kanan */
    padding-right: 750px;   /* kasih jarak dari pinggir kanan */
}


</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
    
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light bg-white shadow-sm border-bottom">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars fa-lg"></i>
                    </a>
                </li>
            </ul>
        
            <!-- Judul Dashboard (opsional, biar lebih elegan) -->
            <span class="navbar-text font-weight-bold ml-3 text-success">
                Admin Dashboard
            </span>
        
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="nav-link d-flex align-items-center text-danger font-weight-bold">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </li>
            </ul>
        </nav>
        
    
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="profile" class="brand-link">
                <i class="fas fa-user-shield brand-image img-circle elevation-3"></i>
                <span class="brand-text font-weight-light">Admin Dashboard</span>
            </a>
        
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- User Panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="{{ route('profile.edit') }}" class="d-block">
                            {{ Auth::user()->name ?? 'Administrator' }}
                        </a>
                        
                        <span class="badge badge-success">Online</span>
                    </div>
                </div>
        
                <!-- Search Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search menu..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
        
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                
                        <!-- Header -->
                        <li class="nav-header">MAIN MENU</li>
                
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                              <i class="nav-icon fa-solid fa-circle-user"></i>
                                <p>User</p>
                            </a>
                        </li>
                
                        <!-- Home -->
                   
                    <li class="nav-header">
                        <i class="fas fa-home text-gray-400 mr-2"></i> Home
                    </li>

                    <!-- Submenu langsung tampil -->
                    <li class="nav-item">
                        <a href="{{ route('admin.home.index') }}" 
                        class="nav-link {{ request()->routeIs('admin.home.*') ? 'active bg-gray-700' : '' }}">
                            <i class="fas fa-sliders-h nav-icon text-gray-400"></i>
                            <p>Slider Home</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.ruang-lingkup.index') }}" 
                        class="nav-link {{ request()->routeIs('admin.ruang-lingkup.*') ? 'active bg-gray-700' : '' }}">
                            <i class="fas fa-layer-group nav-icon text-gray-400"></i>
                            <p>Ruang Lingkup</p>
                        </a>
                    </li>

                
                        <!-- Profil -->
                      <!-- Profil sebagai header -->
                        <li class="nav-header">
                            <i class="fas fa-user text-gray-400 mr-2"></i> Profil
                        </li>

                        <!-- Submenu langsung tampil -->
                        <li class="nav-item">
                            <a href="{{ route('admin.latar-belakang.edit') }}" 
                            class="nav-link {{ request()->routeIs('admin.latar-belakang.*') ? 'active bg-gray-700' : '' }}">
                                <i class="fas fa-file-alt nav-icon text-gray-400"></i>
                                <p>Edit Profil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.teams.index') }}" 
                            class="nav-link {{ request()->routeIs('admin.teams.*') ? 'active bg-gray-700' : '' }}">
                                <i class="fas fa-users nav-icon text-gray-400"></i>
                                <p>Teams</p>
                            </a>
                        </li>

                                        
                        <!-- Info -->
                       <!-- Info sebagai header -->
                        <li class="nav-header">
                            <i class="fas fa-newspaper text-gray-400 mr-2"></i> Info
                        </li>

                        <!-- Submenu langsung tampil -->
                        <li class="nav-item">
                            <a href="{{ route('admin.pamflets.index') }}" 
                            class="nav-link {{ request()->routeIs('admin.pamflets.*') ? 'active bg-gray-700' : '' }}">
                                <i class="fas fa-chalkboard-teacher nav-icon text-gray-400"></i>
                                <p>Pelatihan / Pamflets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.logo.index') }}" 
                            class="nav-link {{ request()->routeIs('admin.logo.*') ? 'active bg-gray-700' : '' }}">
                                <i class="fas fa-handshake nav-icon text-gray-400"></i>
                                <p>Logo Kerja Sama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.faq.index') }}" 
                            class="nav-link {{ request()->routeIs('admin.faq.*') ? 'active bg-gray-700' : '' }}">
                                <i class="fas fa-question-circle nav-icon text-gray-400"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonials.index') }}" 
                            class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active bg-gray-700' : '' }}">
                                <i class="fas fa-comments nav-icon text-gray-400"></i>
                                <p>Testimonials</p>
                            </a>
                        </li>

                
                        <!-- Galeri -->
                     <!-- Galeri -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Galeri<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.galeri.index') }}" class="nav-link">
                                        <p>Foto & Video</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.albums.index') }}" class="nav-link">
                                        <p>Albums</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Berita -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>Berita<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.berita.index') }}" class="nav-link">
                                        <p>Berita</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.tags.index') }}" class="nav-link">
                                        <p>Tags</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.kategori.index') }}" class="nav-link">
                                        <p>Kategori Berita</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                
                    </ul>
                </nav>
                                                
            </div>
        </aside>
        
    
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="admin-card">
                @yield('content')
            </div>
        </div>
    
        <!-- Footer -->
      
      {{-- <footer class="main-footer footer-container" 
        style="background-color: #fff; 
               border: 1px solid #dee2e6; 
               border-radius: 1rem; 
               box-shadow: 0 -2px 6px rgba(0,0,0,0.05); 
               margin: 1rem; 
               transition: all 0.3s ease;">

    <div>
        <strong class="text-green-600 footer-text"
                style="transition: color 0.3s, transform 0.3s; cursor: default;">
            &copy; {{ date('Y') }} 
            <a href="/" class="text-success text-decoration-none">GIS Indonesia</a>
        </strong>
        | All rights reserved.
    </div>

    </div> <!-- /.wrapper -->
    
</footer> --}}
    </body>
    


<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>



<script>
function toggleInput() {
    const kategori = document.getElementById('kategori_id')?.value;
    const fotoInput = document.getElementById('fotoInput');
    const videoInput = document.getElementById('videoInput');
    const fotoField = document.getElementById('foto');
    const videoField = document.getElementById('video_link');
    const kategoriFotoId = '{{ \App\Http\Controllers\Admin\GaleriFotoController::KATEGORI_FOTO }}';
    const kategoriVideoId = '{{ \App\Http\Controllers\Admin\GaleriFotoController::KATEGORI_VIDEO }}';

    if (!kategori) return;

    if (kategori === kategoriFotoId) {
        fotoInput.style.display = 'block';
        videoInput.style.display = 'none';
        if(fotoField) fotoField.required = true;
        if(videoField) videoField.required = false;
    } else if (kategori === kategoriVideoId) {
        fotoInput.style.display = 'none';
        videoInput.style.display = 'block';
        if(fotoField) fotoField.required = false;
        if(videoField) videoField.required = true;
    } else {
        fotoInput.style.display = 'none';
        videoInput.style.display = 'none';
        if(fotoField) fotoField.required = false;
        if(videoField) videoField.required = false;
    }
}
window.addEventListener('DOMContentLoaded', toggleInput);
</script>

<script>
    const footerText = document.querySelector('.footer-text');
    footerText.addEventListener('mouseenter', () => {
        footerText.style.color = '#1e7e34'; // hijau lebih gelap saat hover
        footerText.style.transform = 'scale(1.05)';
    });
    footerText.addEventListener('mouseleave', () => {
        footerText.style.color = '#28a745'; // kembali ke hijau default
        footerText.style.transform = 'scale(1)';
    });
</script>

<script>
    function toggleInput() {
        const kategori = document.getElementById('kategori_id').value;
        const fotoInput = document.getElementById('foto').closest('.form-group');
        const videoInput = document.getElementById('videoInput');
    
        if (kategori == "{{ \App\Http\Controllers\Admin\GaleriFotoController::KATEGORI_FOTO }}") {
            // Tampilkan input foto
            fotoInput.style.display = 'block';
            videoInput.style.display = 'none';
        } else if (kategori == "{{ \App\Http\Controllers\Admin\GaleriFotoController::KATEGORI_VIDEO }}") {
            // Tampilkan input video
            fotoInput.style.display = 'none';
            videoInput.style.display = 'block';
        } else {
            fotoInput.style.display = 'none';
            videoInput.style.display = 'none';
        }
    }
    
    // Jalankan saat halaman load untuk menyesuaikan input sesuai kategori awal
    document.addEventListener('DOMContentLoaded', function() {
        toggleInput();
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const albumCards = document.querySelectorAll('.album-card');

        albumCards.forEach(card => {
            card.addEventListener('click', () => {
                const albumId = card.dataset.albumId;

                // sembunyikan semua album content
                document.querySelectorAll('.album-content').forEach(content => {
                    if(content.id !== 'album-content-' + albumId) {
                        new bootstrap.Collapse(content, { toggle: false }).hide();
                    }
                });

                // toggle album content yang diklik
                const target = document.getElementById('album-content-' + albumId);
                new bootstrap.Collapse(target, { toggle: true });
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let albumSelect = document.querySelector("select[name='album_id']");
        let tanggalInput = document.getElementById("tanggal");
    
        function setTanggalDefault() {
            let selectedOption = albumSelect.options[albumSelect.selectedIndex];
            let albumText = selectedOption.text;
            let tahunMatch = albumText.match(/\((\d{4})\)/);
    
            if (tahunMatch) {
                let tahun = tahunMatch[1];
                let today = new Date();
                let defaultDate = `${tahun}-${String(today.getMonth()+1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;
    
                tanggalInput.value = defaultDate;
                tanggalInput.min = `${tahun}-01-01`;
                tanggalInput.max = `${tahun}-12-31`;
            }
        }
    
        // Jalankan saat halaman dibuka
        setTanggalDefault();
    
        // Jalankan setiap album diganti
        albumSelect.addEventListener("change", setTanggalDefault);
    });
    </script>
{{-- 
<script>
    ClassicEditor
        .create(document.querySelector('#konten'))
        .catch(error => {
            console.error(error);
        });
</script> --}}

@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif

@if(session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}"
        });
    </script>
@endif


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('btnSubmit').addEventListener('click', function () {
    Swal.fire({
        title: 'Yakin?',
        text: "Anda akan menambahkan data beranda baru!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, simpan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('homeForm').submit(); // ⬅️ submit form yang benar
        }
    })
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('btnUpdate').addEventListener('click', function () {
    Swal.fire({
        title: 'Yakin?',
        text: "Data beranda akan diperbarui!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('homeEditForm').submit();
        }
    })
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Tangkap semua form dengan class form-delete
    document.querySelectorAll('.form-delete').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // stop submit dulu

            Swal.fire({
                title: 'Yakin?',
                text: "Data ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // lanjut submit kalau confirm
                }
            });
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Konfirmasi tambah data
    document.getElementById('btnAddLingkup').addEventListener('click', function () {
        Swal.fire({
            title: 'Yakin?',
            text: "Data ruang lingkup baru akan ditambahkan!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, tambah!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formAddLingkup').submit();
            }
        })
    });
</script>



@stack('scripts')
</body>
</html>
