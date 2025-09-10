@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-0 text-success"><i class="fas fa-edit"></i> Edit Ruang Lingkup</h1>
        </div>
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.ruang-lingkup.index') }}">Ruang Lingkup</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-header bg-success text-white">
                <h3 class="card-title mb-0"><i class="fas fa-pen"></i> Form Edit Ruang Lingkup</h3>
            </div>

            <form id="formEditLingkup" action="{{ route('admin.ruang-lingkup.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">

                    {{-- Gambar Ikon --}}
                    <div class="form-group">
                        <label for="icon">Gambar Ikon</label>
                        <input type="file" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror">

                        @if ($item->icon)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $item->icon) }}" 
                                     alt="Ikon Saat Ini" 
                                     class="img-thumbnail border" 
                                     style="width: 80px; height: 80px; object-fit: contain;">
                            </div>
                        @endif
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>

                        @error('icon')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Judul --}}
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title', $item->title) }}" 
                               class="form-control @error('title') is-invalid @enderror" 
                               required>
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" rows="3" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  required>{{ old('description', $item->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="card-footer d-flex">
                    <a href="{{ route('admin.ruang-lingkup.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="button" id="btnEditLingkup" class="btn btn-success ml-auto">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
                
                
            </form>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Konfirmasi sebelum update
    document.getElementById('btnEditLingkup').addEventListener('click', function () {
        Swal.fire({
            title: 'Yakin simpan perubahan?',
            text: "Data ruang lingkup akan diperbarui.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formEditLingkup').submit();
            }
        })
    });

    // SweetAlert sukses setelah update
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#28a745'
        });
    @endif
</script>
@endpush
