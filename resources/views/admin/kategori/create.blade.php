@extends('layouts.admin')

@section('content')

<section class="content-header mb-3 d-flex justify-content-between align-items-center">
    <h1 class="m-0">Tambah Kategori</h1>
    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</section>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form id="kategoriForm" action="{{ route('admin.kategori.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label fw-bold">Nama Kategori</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('kategoriForm').addEventListener('submit', function(e) {
        e.preventDefault(); // tahan submit dulu
        Swal.fire({
            title: 'Yakin ingin menambah kategori baru?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit(); // submit kalau user pilih Ya
            }
        });
    });
</script>

@endsection
