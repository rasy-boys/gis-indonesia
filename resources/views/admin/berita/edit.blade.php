@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="row">
    <div class="col-md-12 px-3"> <!-- padding kanan kiri -->
        <div class="card card-success shadow">
            <div class="card-header">
                <h3 class="card-title">Edit Berita</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-tool text-white">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    
                    
                    <style>
                        .card-body {
    width: 100%;          /* biar penuh selebar card */
    flex: 1;              /* isi ruang kosong yang tersedia */
    display: flex;
    flex-direction: column; /* biar konten tetap tersusun dari atas ke bawah */
    justify-content: flex-start; /* mulai dari atas */
}
.konten-wrapper {
    padding-left: 20px;
    padding-right: 20px;
}

#editor-konten {
    height: 300px;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 12px; /* isi editor punya jarak */
}

</style>
                    <!-- Judul -->
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" value="{{ $berita->judul }}" class="form-control" required>
                    </div>

                      <!-- Gambar Utama -->
                      <div class="form-group">
                        <label>Gambar Utama</label>
                        <div class="custom-file">
                            <input type="file" name="gambar" class="custom-file-input" id="gambar" onchange="previewGambarUtama(event)">
                            <label class="custom-file-label" for="gambar">Pilih file</label>
                        </div>
                    
                        <div class="row mt-3">
                            <!-- Gambar Lama -->
                            @if ($berita->gambar)
                                <div class="col-md-6">
                                    <label>Gambar Lama</label>
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-thumbnail w-100" style="max-width: 250px;">
                                </div>
                            @endif
                    
                            <!-- Preview Gambar Baru -->
                            <div class="col-md-6" id="preview-gambar-utama"></div>
                        </div>
                    </div>

                    <!-- Penulis -->
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" name="penulis" value="{{ old('penulis', $berita->penulis ?? '') }}" class="form-control">
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="{{ $berita->tanggal }}" class="form-control" required>
                    </div>

                    <!-- Kategori -->
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_id', $berita->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Deskripsi -->
                    {{-- <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="3" class="form-control" required>{{ $berita->deskripsi }}</textarea>
                    </div> --}}
                    <div class="mb-4">
                        <label>Tags</label>
                        <div>
                            @foreach($tags as $tag)
                                <label style="display: inline-block; margin-right: 10px;">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                        {{ isset($berita) && $berita->tags->contains($tag->id) ? 'checked' : '' }}>
                                    {{ $tag->nama }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    
                    

                   <!-- Gambar Tambahan -->
<div class="form-group">
    <label>Gambar Tambahan</label>
    <div class="custom-file">
        <input type="file" name="gambar_lain[]" multiple class="custom-file-input" id="gambar_lain" onchange="previewGambarLain(event)">
        <label class="custom-file-label" for="gambar_lain">Pilih beberapa file</label>
    </div>
    <small class="form-text text-muted">Bisa upload lebih dari 1 file</small>
</div>

<div class="row mt-3">
    <!-- Gambar Tambahan Lama -->
    @if ($berita->images && $berita->images->count())
        @foreach ($berita->images as $img)
            <div class="col-md-3 mb-3 position-relative">
                <!-- Tombol X -->
                <button type="button" 
                        class="btn btn-sm btn-danger position-absolute" 
                        style="top: 5px; right: 5px; border-radius: 50%;" 
                        onclick="hapusGambarLama({{ $img->id }}, this)">
                    &times;
                </button>

                <img src="{{ asset('storage/' . $img->gambar) }}" 
                     class="img-thumbnail w-100" 
                     style="height: 150px; object-fit: cover;">

                <!-- Input hidden untuk menandai yang dihapus -->
                <input type="hidden" name="hapus_gambar[]" value="" id="hapus_gambar_{{ $img->id }}">
            </div>
        @endforeach
    @endif

    <!-- Preview Gambar Tambahan Baru -->
    <div class="col-md-12 d-flex flex-wrap" id="preview-gambar-lain"></div>
</div>

                    

                    <!-- Konten Lengkap -->
                    <div class="form-group konten-wrapper">
                        <label>Konten Lengkap</label>
                        <div id="editor-konten"></div>
                        <input type="hidden" name="konten" id="konten" value="{{ old('konten', $berita->konten) }}">
                        @error('konten')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    

@push('scripts')
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        // Inisialisasi Quill
        var quillKonten = new Quill('#editor-konten', {
            theme: 'snow',
            placeholder: 'Tuliskan isi lengkap berita...'
        });

        // Set isi awal dari database atau old value
        let kontenAwal = `{!! old('konten', $berita->konten) !!}`;
        quillKonten.root.innerHTML = kontenAwal;

        // Sinkronisasi ke hidden input
        function syncQuill() {
            document.getElementById('konten').value = quillKonten.root.innerHTML.trim();
        }

        // Sync setiap kali ada perubahan di editor
        quillKonten.on('text-change', syncQuill);

        // Sync sebelum submit
        document.querySelector('form').addEventListener('submit', function () {
            syncQuill();
        });
    </script>
@endpush

                    
                    
                  
                    
                  

                <div class="card-footer">
                    <button type="button" class="btn btn-success" id="btnUpdate">
                        <i class="fas fa-save"></i> Perbarui
                    </button>
                    
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        bsCustomFileInput.init();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        bsCustomFileInput.init();
    });

    // Konfirmasi Update
    document.getElementById('btnUpdate').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin memperbarui berita?',
            text: "Perubahan akan disimpan permanen.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Perbarui!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.closest('form').submit();
            }
        });
    });

    // Notifikasi sukses setelah redirect
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>

<script>
    function hapusGambarLama(id, button) {
        // Set value hidden input agar terbaca di backend
        document.getElementById('hapus_gambar_' + id).value = id;
    
        // Kasih efek transparan / sembunyikan gambarnya
        button.parentElement.style.opacity = "0.4";
        button.parentElement.style.pointerEvents = "none";
    }
    </script>
    
<script>
    function previewGambarUtama(event) {
        let preview = document.getElementById('preview-gambar-utama');
        preview.innerHTML = ""; // reset
        let file = event.target.files[0];
        if(file){
            let reader = new FileReader();
            reader.onload = function(e){
                preview.innerHTML = `<label>Gambar Baru</label><img src="${e.target.result}" class="img-thumbnail w-100" style="max-width: 250px;">`;
            }
            reader.readAsDataURL(file);
        }
    }
    
    function previewGambarLain(event) {
        let preview = document.getElementById('preview-gambar-lain');
        preview.innerHTML = ""; // reset
        Array.from(event.target.files).forEach(file => {
            let reader = new FileReader();
            reader.onload = function(e){
                let img = document.createElement('img');
                img.src = e.target.result;
                img.className = "img-thumbnail m-2";
                img.style.height = "150px";
                img.style.objectFit = "cover";
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    }
    </script>
@endpush
