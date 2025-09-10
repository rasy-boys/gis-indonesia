@extends('layouts.admin')

@section('content')

<section class="content-header mb-3">
    <h1 class="m-0">Edit Album</h1>
</section>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form id="editAlbumForm" action="{{ route('admin.albums.update', $album->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="nama">Nama Album</label>
                    <input type="text" name="nama" id="nama" 
                           value="{{ old('nama', $album->nama) }}" 
                           class="form-control @error('nama') is-invalid @enderror" 
                           required>
                    @error('nama')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="tahun">Tahun</label>
                    <input type="number" name="tahun" id="tahun" 
                           value="{{ old('tahun', $album->tahun) }}" 
                           class="form-control @error('tahun') is-invalid @enderror" 
                           required>
                    @error('tahun')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="{{ route('admin.albums.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="button" class="btn btn-primary" onclick="confirmEditAlbum()">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmEditAlbum() {
    Swal.fire({
        title: 'Yakin update album ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, update',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#6c757d'
    }).then((result) => {
        if(result.isConfirmed){
            document.getElementById('editAlbumForm').submit();
        }
    });
}
</script>

@endsection
