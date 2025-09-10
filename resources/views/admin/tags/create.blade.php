@extends('layouts.admin')

@section('title', 'Tambah Tag')

@section('content')

<section class="content-header mb-3 d-flex justify-content-between align-items-center">
    <h1 class="m-0">Tambah Tag</h1>
    <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary btn-sm shadow-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</section>

<section class="content">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle me-1"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form id="tagForm" action="{{ route('admin.tags.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Tag</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success" id="btnSubmit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById("tagForm").addEventListener("submit", function(e){
        e.preventDefault(); // tahan submit dulu
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Tag akan disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit(); // submit form kalau yakin
            }
        });
    });
</script>

@endsection
