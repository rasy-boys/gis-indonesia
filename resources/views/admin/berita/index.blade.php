@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Berita</h1>
            </div>
         
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                <form method="GET" class="form-inline d-flex flex-wrap gap-2">
                    <!-- Filter Tahun -->
                    <div class="form-group mr-2">
                        <label for="tahun" class="mr-2 font-weight-bold">Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control form-control-sm" onchange="this.form.submit()">
                            <option value="">Semua Tahun</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <!-- Filter Kategori -->
                    <div class="form-group mr-2">
                        <label for="kategori" class="mr-2 font-weight-bold">Kategori:</label>
                        <select name="kategori" id="kategori" class="form-control form-control-sm" onchange="this.form.submit()">
                            <option value="">Semua Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            
                <!-- Aksi Cepat -->
                <div class="d-flex button-group mt-2 mt-md-0">
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-info btn-sm">
                        <i class="fas fa-tags"></i> Kelola Tags
                    </a>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-folder"></i> Kelola Kategori
                    </a>
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah Berita
                    </a>
                </div>
            </div>
        
            <div class="card-body">
                <div class="row">
                    @forelse ($beritas as $berita)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <!-- Cover -->
                                @if ($berita->gambar)
                                <div class="d-flex justify-content-center align-items-center bg-light" style="height:200px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                         class="card-img-top"
                                         alt="gambar {{ $berita->judul }}"
                                         style="max-height:100%; max-width:100%; object-fit:contain;">
                                </div>
                            @else
                                <div class="d-flex justify-content-center align-items-center bg-light" style="height:200px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
                            
        
                                <div class="card-body d-flex flex-column">
                                    <!-- Judul -->
                                    <h5 class="card-title text-success">{{ $berita->judul }}</h5>
                                
                                    <!-- Penulis & Tanggal -->
                                    <small class="text-muted mb-2">
                                        Oleh: <strong>{{ $berita->penulis ?? 'Admin' }}</strong> • 
                                        {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                                    </small>
                                
                                    <!-- Konten singkat -->
                                    @php
                                        $konten = strip_tags($berita->konten, '<p><strong><em><ul><ol><li>');
                                        $konten = \Illuminate\Support\Str::words($konten, 20, '...');
                                    @endphp
                                    <p class="card-text">{!! $konten !!}</p>
                                
                                    <!-- Aksi -->
                                    <div class="mt-auto pt-3 d-flex justify-content-between">
                                        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center text-muted">Belum ada berita.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        
        <div class="mt-4 pt-3 border-top d-flex justify-content-center">
            {{ $beritas->links('vendor.pagination.tailwind-green') }}
        </div>
    </div>
</section>

<style>
    .button-group a {
    margin-right: 10px; /* atur sesuai kebutuhan */
}

.button-group a:last-child {
    margin-right: 0; /* biar tombol terakhir nggak kepanjangan */
}

</style>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Konfirmasi Hapus
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // cegah submit langsung
            Swal.fire({
                title: 'Yakin hapus berita ini?',
                text: "Data yang dihapus tidak bisa dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit kalau konfirmasi
                }
            });
        });
    });

    // Notifikasi sukses setelah redirect
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>
@endpush
