@extends('layouts.admin')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Edit Testimoni</h1>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        {{-- Alert sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Alert error --}}
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

        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i> Form Edit Testimoni</h3>
            </div>

            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $testimonial->nama) }}"
                               class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $testimonial->jabatan) }}"
                               class="form-control @error('jabatan') is-invalid @enderror" placeholder="Masukkan jabatan">
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating <small class="text-muted">(1 - 5)</small></label>
                        <input type="number" name="rating" id="rating" min="1" max="5"
                               value="{{ old('rating', $testimonial->rating) }}"
                               class="form-control @error('rating') is-invalid @enderror">
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Testimoni pakai Quill --}}
                    <div class="form-group">
                        <label for="deskripsi_singkat">Testimoni</label>
                        <div id="editor-deskripsi" style="height: 150px;"></div>
                        <input type="hidden" name="deskripsi_singkat" id="deskripsi_singkat">
                        @error('deskripsi_singkat')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar lama --}}
                    @if($testimonial->gambar)
                        <div class="form-group">
                            <label>Gambar Saat Ini</label><br>
                            <img src="{{ asset('storage/' . $testimonial->gambar) }}" 
                                 alt="Gambar Testimoni" class="img-thumbnail mb-2" style="max-width: 200px;">
                        </div>
                    @endif

                    {{-- Upload baru --}}
                    <div class="form-group">
                        <label for="gambar">Ganti Gambar (Opsional)</label>
                        <input type="file" name="gambar" id="gambar"
                               class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, max 2MB</small>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Update Testimoni
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

        // Set isi awal dari DB / old value
        quillDeskripsi.root.innerHTML = `{!! old('deskripsi_singkat', $testimonial->deskripsi_singkat) !!}`;

        // Sinkronisasi ke hidden input
        function syncQuill() {
            document.getElementById('deskripsi_singkat').value = quillDeskripsi.root.innerHTML.trim();
        }

        // Sync setiap kali ada perubahan
        quillDeskripsi.on('text-change', syncQuill);

        // Sync sebelum submit
        document.querySelector('form').addEventListener('submit', function () {
            syncQuill();
        });
    </script>
@endpush
