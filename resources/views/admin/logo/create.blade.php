{{-- resources/views/admin/logo/create.blade.php --}}
@extends('layouts.admin')

@section('content')
<section class="content-header mb-3">
    <h1>Tambah Logo Kerja Sama</h1>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form id="logoForm" action="{{ route('admin.logo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Gambar Logo</label>
                    <input type="file" name="logo" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>
                        Link Website 
                        <small class="text-muted">(opsional)</small>
                    </label>
                    <input 
                        type="url" 
                        name="link" 
                        class="form-control" 
                        placeholder="https://example.com">
                    <small class="form-text text-muted">
                        Isi jika logo memiliki website, kosongkan jika tidak ada.
                    </small>
                </div>
                
                
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.logo.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('logoForm').addEventListener('submit', function(e) {
        e.preventDefault(); // cegah submit langsung

        Swal.fire({
            title: 'Simpan Data?',
            text: "Pastikan data sudah benar sebelum disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit(); // submit form jika konfirmasi "Ya"
            }
        });
    });
</script>

@endsection


