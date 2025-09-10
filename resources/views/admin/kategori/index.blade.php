{{-- resources/views/admin/kategori/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Kelola Kategori Berita')

@section('content')
<section class="content-header mb-3 d-flex justify-content-between align-items-center">
    <h1 class="m-0">Daftar Kategori Berita</h1>
    <a href="{{ route('admin.kategori.create') }}" class="btn btn-success btn-sm shadow-sm">
        <i class="fas fa-plus"></i> Tambah Kategori
    </a>
</section>

<section class="content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($kategoris->isEmpty())
        <div class="alert alert-secondary text-center p-4 rounded shadow-sm">
            <i class="fas fa-folder-open fa-2x mb-2"></i>
            Belum ada kategori. Yuk buat kategori baru!
        </div>
    @else
       
    <table id="kategoriTable" class="table table-striped align-middle text-center mb-0" style="border:1px solid #000;">
        <thead class="table-dark">
            <tr>
                <th style="width: 50px; border:1px solid #000;">#</th>
                <th class="text-start" style="border:1px solid #000;">Nama Kategori</th>
                <th style="width: 180px; border:1px solid #000;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoris as $kategori)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-start">
                    <i class="fas fa-tag text-primary me-1"></i>
                    {{ $kategori->nama }}
                </td>
                <td>
                    <a href="{{ route('admin.kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm text-white me-1">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST" class="d-inline deleteForm">
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
    </table>
    
    
    <style>
    /* Hover effect */
  /* Hanya tbody yang dapat hover */
#kategoriTable tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
}
    
#kategoriTable {
    width: 100%;
    border-collapse: collapse;
}

    /* Icon spacing */
    #kategoriTable td i {
        margin-right: 6px;
    }
    
    /* Tombol kecil dan simetris */
    #kategoriTable .btn-sm {
        padding: 0.375rem 0.5rem;
        font-size: 0.85rem;
    }
    
    /* Border hitam tegas */
    #kategoriTable, 
#kategoriTable th, 
#kategoriTable td {
    border: 1px solid rgba(0, 0, 0, 0.3) !important; /* border tipis dan agak transparan */
}

    </style>
        
          
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
    var t = $('#kategoriTable').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": 2 } // Kolom aksi tidak bisa di-sort
        ]
    });

    // Nomor otomatis
    t.on('order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();

    // SweetAlert Hapus
    $('.btnDelete').on('click', function(){
        const form = $(this).closest('.deleteForm');
        Swal.fire({
            title: 'Yakin Hapus Kategori?',
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
