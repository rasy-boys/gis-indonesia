@extends('layouts.admin')

@section('content')

<section class="content-header mb-3">
    <h1 class="m-0">Tambah Album</h1>
</section>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form id="albumForm" action="{{ route('admin.albums.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="nama">Nama Album</label>
                    <input type="text" name="nama" id="nama" 
                           value="{{ old('nama') }}" 
                           class="form-control @error('nama') is-invalid @enderror" 
                           required>
                    @error('nama')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="tahun">Tahun</label>
                    <select name="tahun" id="tahun" 
                            class="form-control @error('tahun') is-invalid @enderror" 
                            required>
                        @for ($i = date('Y'); $i >= 2000; $i--)
                            <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                    @error('tahun')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="{{ route('admin.albums.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="button" class="btn btn-success" onclick="confirmSubmit()">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmSubmit() {
    Swal.fire({
        title: 'Yakin simpan album ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, simpan',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d'
    }).then((result) => {
        if(result.isConfirmed){
            document.getElementById('albumForm').submit();
        }
    });
}
</script>

@endsection
