@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3">Tambah Data Beranda</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form id="homeForm" action="{{ route('admin.home.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" 
                           value="{{ old('title') }}" 
                           class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" 
                              class="form-control" rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>

                <div class="mt-3">
                    <button type="button" id="btnSubmit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.home.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection

