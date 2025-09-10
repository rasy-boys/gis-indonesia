{{-- resources/views/admin/tags/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Kelola Tag')

@section('content')
<section class="content-header mb-3 d-flex justify-content-between align-items-center">
    <h1 class="m-0">Kelola Tag</h1>
    <a href="{{ route('admin.tags.create') }}" class="btn btn-success btn-sm shadow-sm">
        <i class="fas fa-plus"></i> Tambah Tag
    </a>
</section>

<section class="content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($tags->isEmpty())
        <div class="alert alert-warning text-center p-4 rounded shadow-sm">
            <i class="fas fa-info-circle fa-lg mb-2"></i>
            <p class="mb-0">Belum ada tag. Yuk tambahkan tag baru!</p>
        </div>
    @else
     
                <table id="myTable" class="table table-hover table-bordered table-striped text-center align-middle mb-0">
                    <thead style="background-color:#070707; color:#fff;">
                        <tr>
                            <th style="width: 60px; border:0.5px solid #000;">No</th>
                            <th class="text-start" style="border:0.5px solid #000;">Nama Tag</th>
                            <th style="width: 180px; border:0.5px solid #000;">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($tags as $index => $tag)
                        <tr>
                            <td></td>
                            <td class="text-start">{{ $tag->nama }}</td>
                            <td>
                                <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning btn-sm text-white me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="d-inline deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btnDelete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <style>
                        #myTable th, #myTable td {
                            border: 1px solid rgba(0, 0, 0, 0.3) !important; /* border tipis dan agak transparan */
}
</style>
                </table>
          
    @endif
</section>
@endsection

@push('scripts')
<!-- jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // DataTables
    var t = $('#myTable').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": 2 } // Kolom aksi tidak bisa di-sort
        ]
    });

    // Nomor urut otomatis
    t.on('order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    // SweetAlert Hapus
    $('.btnDelete').on('click', function(){
        const form = $(this).closest('.deleteForm');
        Swal.fire({
            title: 'Yakin hapus tag?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endpush
