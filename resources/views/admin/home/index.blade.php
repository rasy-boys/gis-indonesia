@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Data Beranda</h1>
        <a href="{{ route('admin.home.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Slider
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table id="myTable" class="table table-bordered table-striped text-center align-middle">
                <thead class="bg-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 120px;">Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($homes as $home)
                        <tr>
                            <td></td> <!-- Nomor urut otomatis DataTables -->
                            <td class="text-start">
                                @if($home->image)
                                    <img src="{{ asset('storage/' . $home->image) }}" 
                                         alt="Gambar" width="100" 
                                         class="img-thumbnail">
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                            <td>{{ $home->title }}</td>
                            <td>{{ $home->description }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.home.edit', $home->id) }}" 
                                       class="btn btn-warning d-flex align-items-center justify-content-center"
                                       style="width:35px; height:35px;" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.home.destroy', $home->id) }}" 
                                          method="POST" 
                                          class="deleteHomeForm m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                class="btn btn-danger d-flex align-items-center justify-content-center btnDelete"
                                                style="width:35px; height:35px;"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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
    var t = $('#myTable').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": 4 } // Kolom aksi tidak bisa di-sort
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
        const form = $(this).closest('.deleteHomeForm');
        Swal.fire({
            title: 'Yakin menghapus slider?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
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
