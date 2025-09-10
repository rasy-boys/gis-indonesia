@extends('layouts.admin')

@section('content')

<section class="content-header mb-3 d-flex justify-content-between align-items-center">
    <h1 class="m-0">Edit Kategori</h1>
</section>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" id="formUpdateKategori">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $kategori->nama) }}" required>
                    @error('nama')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>

                    <button type="submit" class="btn btn-success btnUpdate">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- SweetAlert Konfirmasi Update --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelector('.btnUpdate').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin update kategori?',
            text: "Perubahan akan disimpan",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, update!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formUpdateKategori').submit();
            }
        })
    });
</script>

@endsection
