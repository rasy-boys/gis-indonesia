{{-- resources/views/admin/galeri/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<section class="content-header mb-3">
    <h1>Tambah Galeri</h1>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="galeriForm" action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control" required onchange="toggleInput()">
                        <option value="">--Pilih Kategori--</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Album</label>
                
                    @if($album_id)
                        <input type="hidden" name="album_id" value="{{ $album_id }}">
                        @php
                            $albumSelected = $albums->firstWhere('id', $album_id);
                        @endphp
                        <input type="text" class="form-control" value="{{ $albumSelected->nama }} ({{ $albumSelected->tahun }})" readonly>
                    @else
                        <select name="album_id" class="form-control">
                            <option value="">-- Pilih Album --</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->id }}" {{ old('album_id') == $album->id ? 'selected' : '' }}>
                                    {{ $album->nama }} ({{ $album->tahun }})
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="form-group" id="fotoInput" style="display:none;">
                    <label>Upload Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                </div>

                <div class="form-group" id="videoInput" style="display:none;">
                    <label>Link Video</label>
                    <input type="url" name="video_link" id="video_link" class="form-control" placeholder="Tempel link video disini" value="{{ old('video_link') }}">
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input 
                        type="date" 
                        id="tanggal" 
                        name="tanggal" 
                        class="form-control" 
                        value="{{ old('tanggal') }}" 
                        required
                        @if($album_tahun)
                            min="{{ $album_tahun }}-01-01" 
                            max="{{ $album_tahun }}-12-31"
                        @endif
                    >
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success" id="submitBtn"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('galeriForm').addEventListener('submit', function(e){
        e.preventDefault(); // hentikan submit default
        Swal.fire({
            title: 'Simpan Galeri?',
            text: "Pastikan data sudah benar sebelum disimpan!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // submit form jika dikonfirmasi
            }
        });
    });
</script>
@endpush
