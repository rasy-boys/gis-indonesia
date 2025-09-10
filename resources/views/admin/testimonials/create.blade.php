@extends('layouts.admin')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Tambah Testimoni</h1>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Terjadi Kesalahan!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus"></i> Form Tambah Testimoni</h3>
            </div>

            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                               class="form-control" placeholder="Masukkan nama">
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" 
                               class="form-control" placeholder="Masukkan jabatan">
                    </div>

                    {{-- Testimoni pakai Quill --}}
                    <div class="form-group">
                        <label for="deskripsi_singkat">Testimoni</label>
                        <div id="editor-deskripsi" style="height: 150px;">{!! old('deskripsi_singkat') !!}</div>
                        <input type="hidden" name="deskripsi_singkat" id="deskripsi_singkat">
                        @error('deskripsi_singkat')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating <small class="text-muted">(1 - 5)</small></label>
                        <input type="number" name="rating" id="rating" min="1" max="5" 
                               value="{{ old('rating') }}" class="form-control" placeholder="Masukkan rating">
                    </div>

                    <div class="form-group">
                        <label for="gambar">Foto/Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                        <small class="text-muted">Format: JPG, PNG, max 2MB</small>
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        // Inisialisasi Quill untuk testimoni
        var quillDeskripsi = new Quill('#editor-deskripsi', {
            theme: 'snow'
        });

        // Set isi awal (old value)
        quillDeskripsi.root.innerHTML = `{!! old('deskripsi_singkat') !!}`;

        // Sync ke hidden input
        function syncQuill() {
            document.getElementById('deskripsi_singkat').value = quillDeskripsi.root.innerHTML.trim();
        }

        // Sync saat ada perubahan
        quillDeskripsi.on('text-change', syncQuill);

        // Sync sebelum submit
        document.querySelector('form').addEventListener('submit', function () {
            syncQuill();
        });
    </script>
@endpush
