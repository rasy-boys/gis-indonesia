{{-- resources/views/admin/teams/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<style>
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
        <div class="card-header bg-success text-white">
            <h3 class="card-title mb-0">
                <i class="fas fa-user-plus"></i> Tambah Anggota Tim
            </h3>
        </div>
        <div class="card-body">
            <form id="formCreateTeam" action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        {{-- Foto --}}
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
                        </style>
                        
                        <div class="form-group text-left">
                            <label for="gambar" class="d-block mb-2">Foto</label>
                        
                            <!-- Kotak Upload -->
                            <label for="gambar" class="upload-box">
                                <i class="fas fa-plus icon"></i>
                                <img id="previewImage" src="">
                            </label>
                        
                            <!-- Input File (disembunyikan) -->
                            <input type="file" name="gambar" id="gambar" 
                                   class="d-none @error('gambar') is-invalid @enderror" 
                                   accept="image/*" onchange="previewFile(event)">
                            @error('gambar')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        {{-- Nama & Jabatan --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jabatan">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Jabatan" value="{{ old('jabatan') }}" required>
                                @error('jabatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Kontak --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="no_telp">No Telepon <span class="text-danger"></span></label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="No Telepon" value="{{ old('no_telp') }}" >
                                @error('no_telp')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Pengalaman --}}
                        <div class="form-group">
                            <label for="pengalaman">Pengalaman (Tahun) <span class="text-danger">*</span></label>
                            <input type="number" name="pengalaman" id="pengalaman" class="form-control @error('pengalaman') is-invalid @enderror" placeholder="Jumlah tahun pengalaman" value="{{ old('pengalaman') }}" min="0" required>
                            @error('pengalaman')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Keahlian <span class="text-danger">*</span></label>
                            <input type="text" name="keahlian" 
                                   class="form-control @error('keahlian') is-invalid @enderror" 
                                   value="{{ old('keahlian') }}" 
                                   id="keahlian-create" 
                                   placeholder="Masukkan keahlian">
                            
                            @error('keahlian')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                                         
                        {{-- Sosial Media --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="instagram">Instagram</label>
                                <input type="url" name="instagram" id="instagram" class="form-control" placeholder="https://instagram.com/username" value="{{ old('instagram') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="facebook">Facebook</label>
                                <input type="url" name="facebook" id="facebook" class="form-control" placeholder="https://facebook.com/username" value="{{ old('facebook') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="linkedin">LinkedIn</label>
                                <input type="url" name="linkedin" id="linkedin" class="form-control" placeholder="https://linkedin.com/in/username" value="{{ old('linkedin') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="twitter">Twitter</label>
                                <input type="url" name="twitter" id="twitter" class="form-control" placeholder="https://twitter.com/username" value="{{ old('twitter') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="youtube">YouTube</label>
                            <input type="url" name="youtube" id="youtube" class="form-control" placeholder="https://youtube.com/@username" value="{{ old('youtube') }}">
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label for="alamat">Alamat <span class="text-danger"></span></label>
                            <textarea 
                                name="alamat" 
                                id="alamat" 
                                class="form-control @error('alamat') is-invalid @enderror" 
                                rows="4" 
                                placeholder="Alamat">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        

                        
                        <div class="form-group">
                            <label for="deskripsi_singkat">Deskripsi Singkat <span class="text-danger"></span></label>
                            <textarea name="deskripsi_singkat" id="deskripsi_singkat" class="form-control @error('deskripsi_singkat') is-invalid @enderror" rows="5" placeholder="Deskripsi Singkat">{{ old('deskripsi_singkat') }}</textarea>
                            @error('deskripsi_singkat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        {{-- Informasi pribadi --}}
                        <div class="form-group">
                            <label for="personal_info">Informasi Pribadi <span class="text-danger">*</span></label>
                            <textarea name="personal_info" id="personal_info" class="form-control @error('personal_info') is-invalid @enderror" rows="7" placeholder="Personal Info" required>{{ old('personal_info') }}</textarea>
                            @error('personal_info')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        {{-- Pengalaman pribadi --}}
                        <div class="form-group">
                            <label for="personal_experience">Pengalaman Pribadi <span class="text-danger"></span></label>
                            <textarea name="personal_experience" id="personal_experience" class="form-control @error('personal_experience') is-invalid @enderror" rows="7" placeholder="Personal Experience">{{ old('personal_experience') }}</textarea>
                            @error('personal_experience')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
   
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" id="btnCreateTeam" class="btn btn-success btn-block">
                        <i class="fas fa-save"></i> Simpan
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
    // Konfirmasi sebelum simpan
    document.getElementById('btnCreateTeam').addEventListener('click', function () {
        Swal.fire({
            title: 'Yakin simpan data?',
            text: "Data anggota tim baru akan ditambahkan.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formCreateTeam').submit();
            }
        })
    });

    // SweetAlert sukses setelah simpan
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#28a745'
        });
    @endif
</script>

<script>
    function previewFile(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('previewImage');
            const icon = document.querySelector('.upload-box .icon');
            output.src = reader.result;
            output.style.display = 'block';
            icon.style.display = 'none';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script>
    var inputCreate = document.querySelector('#keahlian-create');

    // Inisialisasi Tagify
    var tagifyCreate = new Tagify(inputCreate, {
        delimiters: ",",   // pisah tag pakai koma
        maxTags: 20,       // batas maksimal tag
        dropdown: {
            enabled: 0     // nonaktifkan dropdown saran
        }
    });

    // Tidak ada value awal karena halaman create
</script>

@endpush
