{{-- resources/views/admin/galeri/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<section class="content-header mb-3">
    <h1>Edit Galeri</h1>
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

            <form id="galeriEditForm" action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control" required onchange="toggleInput()">
                        <option value="">--Pilih Kategori--</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $galeri->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label>Album</label>
                    <select name="album_id" class="form-control">
                        <option value="">-- Pilih Album --</option>
                        @foreach($albums as $album)
                            <option value="{{ $album->id }}" 
                                {{ $galeri->album_id == $album->id ? 'selected' : '' }}>
                                {{ $album->nama }} ({{ $album->tahun }})
                            </option>
                        @endforeach
                    </select>
                </div>

                @if ($galeri->foto)
                    <div class="form-group">
                        <label>Foto Lama</label>
                        <img src="{{ asset('storage/' . $galeri->foto) }}" alt="Foto Lama" class="img-thumbnail mb-2" style="max-width:200px;">
                    </div>
                @endif

                <div class="form-group">
                    <label>
                        Ganti Foto
                        @if(!$galeri->foto)
                            <span class="text-danger">*</span> (harus diisi)
                        @else
                            (kosongkan jika tidak ingin ganti)
                        @endif
                    </label>
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                </div>

                <div class="form-group" id="videoInput" style="display:none;">
                    <label>Link Video</label>
                    <input type="url" name="video_link" id="video_link" class="form-control" placeholder="Tempel link video disini" value="{{ old('video_link', $galeri->video_link) }}">
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" 
                           value="{{ old('tanggal', $galeri ? \Carbon\Carbon::parse($galeri->tanggal)->format('Y-m-d') : '') }}" required>
                </div>
                

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Perubahan</button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('galeriEditForm').addEventListener('submit', function(e){
        e.preventDefault(); // hentikan submit default
        Swal.fire({
            title: 'Perbarui Galeri?',
            text: "Pastikan data sudah benar sebelum diperbarui!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Perbarui!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // submit form jika dikonfirmasi
            }
        });
    });
</script>

<script>
    function setTanggalLimits() {
        const albumSelect = document.querySelector('select[name="album_id"]');
        const tanggalInput = document.getElementById('tanggal');
    
        function updateLimits() {
            const selectedYear = albumSelect.options[albumSelect.selectedIndex].text.match(/\((\d{4})\)/);
            if(selectedYear) {
                const year = selectedYear[1];
                tanggalInput.min = `${year}-01-01`;
                tanggalInput.max = `${year}-12-31`;
    
                // Jika tanggal sekarang di luar range, reset
                if(tanggalInput.value < tanggalInput.min || tanggalInput.value > tanggalInput.max) {
                    tanggalInput.value = '';
                }
            } else {
                tanggalInput.min = '';
                tanggalInput.max = '';
            }
        }
    
        albumSelect.addEventListener('change', updateLimits);
        updateLimits(); // jalankan saat load halaman
    }
    
    document.addEventListener('DOMContentLoaded', setTanggalLimits);
    </script>
    
@endpush
