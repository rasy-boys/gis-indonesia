@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="row">
    <div class="col-md-12 px-3"> <!-- padding kanan kiri -->
        <div class="card card-success shadow">
            <div class="card-header">
                <h3 class="card-title">Tambah Berita</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-tool text-white">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <style>
                        .card-body {
    width: 100%;          /* biar penuh selebar card */
    flex: 1;              /* isi ruang kosong yang tersedia */
    display: flex;
    flex-direction: column; /* biar konten tetap tersusun dari atas ke bawah */
    justify-content: flex-start; /* mulai dari atas */
}
</style>

                    <!-- Judul -->
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul berita..." required>
                    </div>

                        <!-- Gambar Cover -->
                        <div class="form-group">
                            <label for="gambar" style="cursor: pointer;">Gambar Cover</label>
                            <div class="custom-file">
                                <input type="file" name="gambar" class="custom-file-input" id="gambar" accept="image/*">
                                <label class="custom-file-label" for="gambar">Pilih file</label>
                            </div>
                            <div class="mt-2">
                                <img id="previewCover" src="#" alt="Preview Cover" style="display: none; max-width: 150px; border-radius: 5px;">
                            </div>
                        </div>
                        
                        <script>
                        document.getElementById("gambar").addEventListener("change", function(event) {
                            const file = event.target.files[0];
                            const preview = document.getElementById("previewCover");
                            const label = event.target.nextElementSibling; // label custom-file-label
                            
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    preview.src = e.target.result;
                                    preview.style.display = "block";
                                };
                                reader.readAsDataURL(file);
                        
                                // update nama file di label
                                label.textContent = file.name;
                            } else {
                                preview.style.display = "none";
                                label.textContent = "Pilih file";
                            }
                        });
                        </script>
                        
                    <!-- Penulis -->
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" name="penulis" value="{{ old('penulis', $berita->penulis ?? '') }}" class="form-control" placeholder="Nama penulis...">
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
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

                    <!-- Tags -->
                    <div class="mb-4">
                        <label>Tags</label>
                        <div>
                            @foreach($tags as $tag)
                                <label style="display: inline-block; margin-right: 10px; cursor: pointer;">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ isset($berita) && $berita->tags->contains($tag->id) ? 'checked' : '' }}>
                                    {{ $tag->nama }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                      <!-- Gambar Tambahan -->
                      <div class="form-group">
                        <label for="gambar_lain" style="cursor: pointer;">Gambar Tambahan</label>
                        <div class="custom-file">
                            <input type="file" id="gambar_lain" multiple class="custom-file-input">
                            <label class="custom-file-label" for="gambar_lain">Pilih beberapa file</label>
                        </div>
                        <small class="form-text text-muted">Bisa upload lebih dari 1 file</small>
                        <div class="mt-2" id="previewGambarLain" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>
                    </div>
                    
                    <!-- tempat hidden input biar semua file ikut terkirim -->
                    <div id="hiddenInputs"></div>
                    

                    <!-- Konten Lengkap -->
                    <div class="form-group">
                        <label>Konten Lengkap</label>
                        <div id="editor-konten" style="height: 300px;"></div>
                        <input type="hidden" name="konten" id="konten">
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
                    
                            // Set isi awal jika ada old value (misal validasi gagal)
                            quillKonten.root.innerHTML = `{!! old('konten') !!}`;
                    
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
                    
                

                  

                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-success" id="btnSubmit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
                
                
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Inisialisasi Bootstrap custom file input -->
<script>
    $(document).ready(function(){
        bsCustomFileInput.init();
    });
</script>

<!-- Preview Gambar dan CKEditor -->

<script>
    // Preview Cover
    const coverInput = document.getElementById('gambar');
    const previewCover = document.getElementById('previewCover');
    coverInput.addEventListener('change', function() {
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                previewCover.src = e.target.result;
                previewCover.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    // Preview Gambar Tambahan
    const fileInput = document.getElementById('gambar_lain');
const previewContainer = document.getElementById('previewGambarLain');
const hiddenInputs = document.getElementById('hiddenInputs');

fileInput.addEventListener('change', function () {
    const files = Array.from(this.files);

    files.forEach(file => {
        // Preview gambar
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.height = '100px';
            img.style.objectFit = 'cover';
            img.style.border = '1px solid #ddd';
            img.style.borderRadius = '5px';
            previewContainer.appendChild(img);
        }
        reader.readAsDataURL(file);

        // Bikin hidden input untuk dikirim ke server
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        const newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.name = 'gambar_lain[]';
        newInput.files = dataTransfer.files;
        newInput.hidden = true;
        hiddenInputs.appendChild(newInput);
    });

    // reset biar bisa pilih ulang lagi
    this.value = '';
});

</script>


<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Konfirmasi Simpan
    document.getElementById('btnSubmit').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin menambahkan berita baru?',
            text: "Pastikan semua data sudah benar sebelum disimpan.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.closest('form').submit(); // submit form
            }
        });
    });

    // Pesan sukses setelah redirect
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

@endpush
