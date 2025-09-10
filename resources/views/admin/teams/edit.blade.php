{{-- resources/views/admin/teams/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<style>
    .upload-box {
        width: 150px;
        height: 150px;
        border: 2px dashed #ccc;
        border-radius: 10px; /* ganti 50% kalau mau bulat */
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        overflow: hidden;
        background: #f8f9fa;
        position: relative;
        transition: 0.3s;
    }
    .upload-box:hover {
        border-color: #007bff;
        background: #e9f5ff;
    }
    .upload-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
    }
    .upload-box .icon {
        font-size: 2rem;
        color: #aaa;
        position: absolute;
    }
    .card.shadow-sm.border-0 {
    border-radius: 10px; /* biar lebih soft */
}

.card-body {
    background: transparent; /* hilangkan kesan card dalam card */
    padding: 2rem; /* kasih ruang lebih luas */
}
</style>
<div class="d-flex justify-content-center">
    <div class="card shadow-sm border-0 w-100">
        <div class="card-header bg-success text-white mb-3">
            <h3 class="card-title mb-0">
                <i class="fas fa-user-edit"></i> Edit Anggota Tim
            </h3>
        </div>
        
        <div class="card-body">
      
            <form id="formEditTeam" action="{{ route('admin.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        {{-- Foto --}}
                        <div class="form-group text-left">
                            <label for="gambar" class="d-block mb-2">Foto</label>
                        
                            <!-- Kotak Upload (isi: foto lama atau default) -->
                            <label for="gambar" class="upload-box d-flex align-items-center justify-content-center">
                                <img 
                                    id="previewImage" 
                                    src="{{ $team->gambar ? asset('storage/' . $team->gambar) : asset('images/defaults/profile.png') }}" 
                                    alt="Foto"
                                    class="img-thumbnail"
                                    style="max-width: 200px; height:auto;">
                            </label>
                        
                            <!-- Keterangan -->
                            <small class="text-muted d-block mt-1">
                                Foto saat ini @if($team->gambar) (klik untuk ganti) @else (default, klik untuk upload) @endif
                            </small>
                        
                            <!-- Input File (disembunyikan) -->
                            <input type="file" name="gambar" id="gambar"
                                   class="d-none @error('gambar') is-invalid @enderror"
                                   accept="image/*" onchange="previewFile(event)">
                            @error('gambar')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <script>
                        function previewFile(event) {
                            const reader = new FileReader();
                            reader.onload = function(){
                                const output = document.getElementById('previewImage');
                                const icon = document.querySelector('.upload-box .icon');
                                output.src = reader.result;
                                output.style.display = 'block';
                                if(icon) icon.style.display = 'none';
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        }
                        </script>

                        {{-- Nama & Jabatan --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $team->nama) }}" required>
                                @error('nama')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jabatan">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan', $team->jabatan) }}" required>
                                @error('jabatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Kontak --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $team->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="no_telp">No Telepon <span class="text-danger"></span></label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp', $team->no_telp) }}">
                                @error('no_telp')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>

                        {{-- Pengalaman --}}
                        <div class="form-group">
                            <label for="pengalaman">Pengalaman (Tahun) <span class="text-danger">*</span></label>
                            <input type="number" name="pengalaman" id="pengalaman" class="form-control @error('pengalaman') is-invalid @enderror" value="{{ old('pengalaman', $team->pengalaman) }}" min="0" required>
                            @error('pengalaman')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Keahlian --}}
                        <div class="form-group">
                            <label for="keahlian">Keahlian  <span class="text-danger">*</span></label>
                            <input type="text" name="keahlian" id="keahlian" class="form-control" placeholder="Masukkan keahlian">
                        </div>

                        {{-- Sosial Media --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="instagram">Instagram</label>
                                <input type="url" name="instagram" id="instagram" class="form-control" value="{{ old('instagram', $team->instagram) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="facebook">Facebook</label>
                                <input type="url" name="facebook" id="facebook" class="form-control" value="{{ old('facebook', $team->facebook) }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="linkedin">LinkedIn</label>
                                <input type="url" name="linkedin" id="linkedin" class="form-control" value="{{ old('linkedin', $team->linkedin) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="twitter">Twitter</label>
                                <input type="url" name="twitter" id="twitter" class="form-control" value="{{ old('twitter', $team->twitter) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="youtube">YouTube</label>
                            <input type="url" name="youtube" id="youtube" class="form-control" value="{{ old('youtube', $team->youtube) }}">
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">

                          {{-- Alamat --}}
                          <div class="form-group">
                            <label for="alamat">Alamat <span class="text-danger"></span></label>
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"   rows="4"  >{{ old('alamat', $team->alamat) }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label for="deskripsi_singkat">Deskripsi Singkat <span class="text-danger"></span></label>
                            <textarea name="deskripsi_singkat" id="deskripsi_singkat" class="form-control @error('deskripsi_singkat') is-invalid @enderror" rows="5">{{ old('deskripsi_singkat', $team->deskripsi_singkat) }}</textarea>
                            @error('deskripsi_singkat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Informasi pribadi --}}
                        <div class="form-group">
                            <label for="personal_info">Informasi Pribadi <span class="text-danger">*</span></label>
                            <textarea name="personal_info" id="personal_info" class="form-control @error('personal_info') is-invalid @enderror" rows="7" required>{{ old('personal_info', $team->personal_info) }}</textarea>
                            @error('personal_info')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                      

                        {{-- Pengalaman pribadi --}}
                        <div class="form-group">
                            <label for="personal_experience">Pengalaman Pribadi <span class="text-danger"></span></label>
                            <textarea name="personal_experience" id="personal_experience" class="form-control @error('personal_experience') is-invalid @enderror" rows="7" >{{ old('personal_experience', $team->personal_experience) }}</textarea>
                            @error('personal_experience')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-success btn-block">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css">
<script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Tagify
    var input = document.querySelector('#keahlian');
    var tagify = new Tagify(input, {
        delimiters: ",",
        maxTags: 20,
        dropdown: { enabled: 0 }
    });

    // Ambil data keahlian dari database
    @php
        $keahlianData = [];
        if(!empty($team->keahlian)){
            try {
                $keahlianData = json_decode($team->keahlian, true);
            } catch (\Exception $e) {
                $keahlianData = [];
            }
        }
    @endphp

    @if(!empty($keahlianData))
        tagify.addTags(@json(array_map(fn($item) => $item['value'] ?? $item, $keahlianData)));
    @endif

    // SweetAlert konfirmasi submit
    document.getElementById('formEditTeam').addEventListener('submit', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin update data ini?',
            text: "Perubahan akan disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Update!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.isConfirmed){
                e.target.submit();
            }
        });
    });

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}"
        });
    @endif
</script>

<style>
.upload-box {
    width: 150px;
    height: 150px;
    border: 2px dashed #ccc;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    overflow: hidden;
    background: #f8f9fa;
    position: relative;
    transition: 0.3s;
}
.upload-box:hover {
    border-color: #007bff;
    background: #e9f5ff;
}
.upload-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.upload-box .icon {
    font-size: 2rem;
    color: #aaa;
    position: absolute;
    display: block;
}
</style>
@endpush
