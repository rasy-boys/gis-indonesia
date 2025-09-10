@extends('layouts.admin')

@section('title', 'Data Team')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <h1 class="h3 text-success mb-0"><i class="fas fa-users"></i> Team</h1>
        <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Team
        </a>
    </div>
</div>

<style>
    .row.team-row > [class*="col-"] {
        margin-bottom: 2rem; /* kasih jarak antar card ke bawah */
    }
</style>


<div class="row g-4 mb-5 team-row">
    @forelse ($teams as $team)
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-3 h-100">
                <!-- Gambar -->
                <div class="d-flex justify-content-center align-items-center bg-light" 
                style="height: 250px; overflow: hidden;">
               <img src="{{ $team->gambar ? asset('storage/' . $team->gambar) : asset('images/defaults/profile.png') }}" 
                    alt="gambar {{ $team->nama }}" 
                    class="img-fluid p-2" 
                    style="max-height: 100%; object-fit: contain;">
           </div>
           
                <!-- Konten -->
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold mb-1 text-center">{{ $team->nama }}</h5>
                    <p class="text-success text-center fw-semibold mb-2">{{ $team->jabatan }}</p>
                    {{-- <p class="card-text text-muted text-center flex-grow">{{ $team->deskripsi_singkat }}</p> --}}

                    <!-- Tombol Aksi -->
                    <style>
                        .btn-wrapper {
                            gap: 32px !important; /* jarak antar tombol */
                        }
                    </style>
                    <div class="d-flex justify-content-center mt-3 btn-wrapper">
                        <a href="{{ route('admin.teams.edit', $team->id) }}" 
                           class="btn btn-warning btn-sm px-3">
                            <i class="fas fa-pen-to-square"></i> Edit
                        </a>
                        <form id="deleteForm{{ $team->id }}" 
                              action="{{ route('admin.teams.destroy', $team->id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" 
                                    class="btn btn-danger btn-sm btn-delete px-3" 
                                    data-id="{{ $team->id }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Belum ada data team.
            </div>
        </div>
    @endforelse
</div>


<!-- Pagination -->
<div class="mt-4 pt-3 border-top d-flex justify-content-center">
    {{ $teams->links('vendor.pagination.tailwind-green') }}
</div>
@endsection

{{-- SweetAlert2 --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Konfirmasi hapus
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            let form = document.getElementById('deleteForm' + id);

            Swal.fire({
                title: 'Yakin ingin menghapus data ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // jalankan form hapus
                }
            });
        });
    });

    // Alert sukses
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

