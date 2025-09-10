@extends('layouts.admin')

@section('title', 'Edit Tag')

@section('content')

<section class="content-header mb-3 d-flex justify-content-between align-items-center">
    <h1 class="m-0">Edit Tag</h1>
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
            <form id="editForm" action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Tag</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $tag->nama) }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Perbarui
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
    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault(); // stop form submit dulu
        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin memperbarui tag ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, perbarui!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit(); // submit form kalau konfirmasi
            }
        })
    });
</script>
@endpush
