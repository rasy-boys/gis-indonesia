@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold text-success mb-3">
        <i class="fas fa-plus-circle"></i> Tambah Ruang Lingkup
    </h1>

    {{-- Alert Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan saat input.<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Create --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <i class="fas fa-plus-circle"></i> Form Tambah Ruang Lingkup
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ruang-lingkup.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="icon">Icon</label>
                    <input type="file" name="icon" id="icon" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" 
                           placeholder="Masukkan judul" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" rows="3" class="form-control" 
                              placeholder="Masukkan deskripsi" required></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.ruang-lingkup.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
