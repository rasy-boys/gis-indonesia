{{-- resources/views/admin/logo/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<section class="content-header mb-3">
    <h1>Logo Kerja Sama</h1>
</section>

<section class="content">
    <div class="mb-3">
        <a href="{{ route('admin.logo.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Logo
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse ($logos as $logo)
            <div class="col-6 col-md-3">
                <div class="card card-white shadow mb-3 text-center">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $logo->logo) }}" 
                             alt="Logo" 
                             class="img-fluid mb-2" 
                             style="max-height: 100px;">
    
                        @if ($logo->link)
                            <p class="text-truncate">
                                <a href="{{ $logo->link }}" target="_blank">{{ $logo->link }}</a>
                            </p>
                        @else
                            <p class="text-muted">Tidak ada link</p>
                        @endif
    
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.logo.edit', $logo->id) }}" 
                               class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        
                            <form id="deleteLogoForm{{ $logo->id }}" 
                                  action="{{ route('admin.logo.destroy', $logo->id) }}" 
                                  method="POST" 
                                  style="display:inline-block; margin-left:8px;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $logo->id }})">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">Belum ada logo kerja sama.</p>
            </div>
        @endforelse
    </div>
    
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin hapus logo ini?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteLogoForm' + id).submit();
            }
        });
    }
</script>
@endsection
