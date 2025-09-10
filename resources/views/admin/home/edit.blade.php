@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3">Edit Data Beranda</h1>

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
            <form id="homeEditForm" action="{{ route('admin.home.update', $home->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" 
                           value="{{ old('title', $home->title) }}" 
                           class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" 
                              class="form-control" rows="4" required>{{ old('description', $home->description) }}</textarea>
                </div>
            
                <div class="form-group">
                    <label>Gambar Saat Ini</label><br>
                    @if($home->image)
                        <img src="{{ asset('storage/' . $home->image) }}" 
                             alt="Gambar" class="img-thumbnail mb-2" width="150">
                    @else
                        <p class="text-muted">Tidak ada gambar</p>
                    @endif
                </div>
            
                <div class="form-group">
                    <label for="image">Ganti Gambar</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>
            
                <div class="mt-3">
                    <button type="button" id="btnUpdate" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
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
