{{-- resources/views/admin/logo/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
<section class="content-header mb-3">
    <h1>Edit Logo Kerja Sama</h1>
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form id="logoEditForm" action="{{ route('admin.logo.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Gambar Logo</label><br>
                    @if($logo->gambar)
                        <img src="{{ asset('storage/' . $logo->gambar) }}" alt="Logo" class="img-thumbnail mb-2" style="max-height: 80px;">
                    @endif
                    <input type="file" name="logo" class="form-control">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                </div>

                <div class="form-group">
                    <label>Link Website <small class="text-muted">(opsional)</small></label>
                    <input type="url" 
                           name="link" 
                           value="{{ old('link', $logo->link) }}" 
                           class="form-control" 
                           placeholder="https://example.com">
                </div>
                

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('admin.logo.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('logoEditForm').addEventListener('submit', function(e) {
        e.preventDefault(); // cegah submit langsung

        Swal.fire({
            title: 'Update Data?',
            text: "Pastikan data sudah benar sebelum diperbarui!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Update',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit(); // submit form jika konfirmasi "Ya"
            }
        });
    });
</script>
@endsection



